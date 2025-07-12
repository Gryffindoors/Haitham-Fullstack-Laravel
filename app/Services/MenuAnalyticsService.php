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
        $items = OrderItem::selectRaw('menu_item_id, SUM(quantity) as total_qty, SUM(total_price) as total_revenue')
            ->whereMonth('created_at', $month)
            ->groupBy('menu_item_id')
            ->with('menuItem') // requires relationship
            ->orderByDesc('total_revenue')
            ->limit(5)
            ->get();

        return $items->map(function ($item) {
            $menuItem = $item->menuItem;

            // Optionally: prefetch all ingredients/inventory with joins or cache
            $ingredients = MenuItemsIngredient::where('menu_item_id', $item->menu_item_id)->get();

            $cost = 0;
            foreach ($ingredients as $ingredient) {
                $inv = Inventory::find($ingredient->inventory_id);
                $cost += ($inv?->cost ?? 0) * $ingredient->quantity * $item->total_qty;
            }

            return [
                'menu_item_id' => $item->menu_item_id,
                'name' => $menuItem?->name ?? 'Unknown',
                'quantity_sold' => $item->total_qty,
                'revenue' => round($item->total_revenue, 2),
                'estimated_cost' => round($cost, 2),
                'estimated_profit' => round($item->total_revenue - $cost, 2),
            ];
        });
    }

    public static function lowStockIngredients(): Collection
    {
        return Inventory::whereColumn('quantity', '<', 'min_threshold')
            ->select('id as inventory_id', 'name', 'quantity as current', 'min_threshold as minimum')
            ->get();
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
