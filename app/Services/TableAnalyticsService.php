<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Support\Collection;

class TableAnalyticsService
{
    public static function tableUsage(int $month): Collection
    {
        $orders = Order::whereMonth('created_at', $month)->get();

        return $orders->groupBy('table_id')->map(function ($group, $tableId) {
            $table = Table::find($tableId);

            return [
                'table_id' => $tableId,
                'name' => $table?->table_number ?? 'Unknown',
                'location' => $table?->location->name ?? '',
                'orders_count' => $group->count(),
            ];
        })->sortByDesc('orders_count')->values();
    }
}
