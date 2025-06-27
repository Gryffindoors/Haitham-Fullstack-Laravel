<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\OperatingCost;

class ReportService
{
    public static function getMonthlyProfit(int $month, int $year): float
    {
        $bills = Bill::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        $paidTotal = $bills->filter(fn($b) => $b->status === 'paid')
            ->sum(fn($b) => $b->total_with_charges);

        $costs = OperatingCost::whereMonth('cost_month', $month)
            ->whereYear('cost_month', $year)
            ->sum('amount');

        return round($paidTotal - $costs, 2);
    }

    public static function monthlyProfitTrend(int $monthsBack = 6): array
    {
        $results = [];

        for ($i = $monthsBack - 1; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->month;
            $year = $date->year;

            $bills = Bill::whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->get();

            $paidTotal = $bills->filter(fn($b) => $b->status === 'paid')
                ->sum(fn($b) => $b->total_with_charges);

            $costs = OperatingCost::whereMonth('cost_month', $month)
                ->whereYear('cost_month', $year)
                ->sum('amount');

            $results[] = [
                'month' => $date->format('Y-m'),
                'sales' => round($paidTotal, 2),
                'costs' => round($costs, 2),
                'profit' => round($paidTotal - $costs, 2),
            ];
        }

        return $results;
    }
}
