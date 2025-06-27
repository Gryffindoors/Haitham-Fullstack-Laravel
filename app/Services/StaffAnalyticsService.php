<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Attendance;
use App\Models\Staff;
use Illuminate\Support\Collection;

class StaffAnalyticsService
{
    public static function rankByPerformance(int $month): Collection
    {
        $bills = Bill::whereMonth('created_at', $month)->get();
        $attendance = Attendance::whereMonth('day', $month)->get();

        return $bills->groupBy('created_by')->map(function ($billGroup, $staffId) use ($attendance) {
            $staff = Staff::find($staffId);
            if (!$staff) return null;

            $shifts = $attendance->where('staff_id', $staffId)->count();
            $tips = $billGroup->sum('tips');
            $billsCount = $billGroup->count();

            return [
                'staff_id' => $staffId,
                'name' => $staff->full_name,
                'bills_handled' => $billsCount,
                'tips_received' => round($tips, 2),
                'shifts_attended' => $shifts,
                'score' => $billsCount + ($tips / 10) + $shifts, // example weight
            ];
        })->filter()->sortByDesc('score')->values();
    }
}
