<?php


namespace App\Services;

use App\Models\Bill;
use App\Models\Staff;
use Illuminate\Support\Collection;

class EmployeeReportService
{
    public static function topPerformers(int $month): Collection
    {
        $bills = Bill::whereMonth('created_at', $month)->get();

        return $bills->groupBy('created_by')->map(function ($group, $staffId) {
            $staff = Staff::find($staffId);

            return [
                'staff_id' => $staffId,
                'name' => $staff?->full_name ?? 'Unknown',
                'bills_count' => $group->count(),
                'total_tips' => round($group->sum('tips'), 2),
                'total_sales' => round($group->sum(fn($b) => $b->total_with_charges), 2),
            ];
        })->sortByDesc('total_sales')->values();
    }
}
