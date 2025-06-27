<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\MenuItem;
use App\Models\MenuItemsIngredient;
use App\Models\Inventory;
use Illuminate\Support\Collection;

class MenuAnalyticsService
{
    public static function topMenuItems(int $month): Collection
    {
        $items = OrderItem::whereMonth('created_at', $month)->get();

        return $items->groupBy('menu_item_id')->map(function ($group, $menuItemId) {
            $quantity = $group->sum('quantity');
            $revenue = $group->sum('total_price');
            $menuItem = MenuItem::find($menuItemId);

            // Calculate cost
            $ingredients = MenuItemsIngredient::where('menu_item_id', $menuItemId)->get();

            $cost = 0;
            foreach ($ingredients as $ingredient) {
                $inv = Inventory::find($ingredient->inventory_id);
                $cost += ($inv?->cost ?? 0) * $ingredient->quantity * $quantity;
            }

            return [
                'menu_item_id' => $menuItemId,
                'name' => $menuItem?->name ?? 'Unknown',
                'quantity_sold' => $quantity,
                'revenue' => round($revenue, 2),
                'estimated_cost' => round($cost, 2),
                'estimated_profit' => round($revenue - $cost, 2),
            ];
        })->sortByDesc('revenue')->values();
    }

    public static function lowStockIngredients(): Collection
    {
        return Inventory::all()->filter(
            fn($item) =>
            $item->quantity < $item->min_threshold
        )->map(fn($item) => [
            'inventory_id' => $item->id,
            'name' => $item->name,
            'current' => $item->quantity,
            'minimum' => $item->min_threshold,
        ])->values();
    }

    public static function ingredientUsage(int $month): Collection
    {
        $orderItems = OrderItem::whereMonth('created_at', $month)->get();

        $usage = [];

        foreach ($orderItems as $orderItem) {
            $menuItemId = $orderItem->menu_item_id;
            $quantityOrdered = $orderItem->quantity;

            $ingredients = MenuItemsIngredient::where('menu_item_id', $menuItemId)->get();

            foreach ($ingredients as $ingredient) {
                $inventoryId = $ingredient->inventory_id;
                $usedAmount = $ingredient->quantity * $quantityOrdered;

                if (!isset($usage[$inventoryId])) {
                    $usage[$inventoryId] = 0;
                }

                $usage[$inventoryId] += $usedAmount;
            }
        }

        // Fetch inventory names/units
        return collect($usage)->map(function ($amount, $inventoryId) {
            $inv = Inventory::find($inventoryId);
            return [
                'inventory_id' => $inventoryId,
                'name' => $inv?->name ?? 'Unknown',
                'unit' => $inv?->unit ?? '',
                'used_amount' => round($amount, 2),
            ];
        })->values();
    }
}
