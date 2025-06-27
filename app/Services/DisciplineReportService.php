<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Staff;
use Illuminate\Support\Collection;

class DisciplineReportService
{
    public static function rankByDiscipline(int $month): Collection
    {
        $records = Attendance::whereMonth('day', $month)->get();

        return $records->groupBy('staff_id')->map(function ($group, $staffId) {
            $staff = Staff::find($staffId);

            $lateDays = $group->where('status', 'late')->count();
            $absentDays = $group->where('status', 'absent')->count();

            return [
                'staff_id' => $staffId,
                'name' => $staff?->full_name ?? 'Unknown',
                'absent_days' => $absentDays,
                'late_days' => $lateDays,
                'score' => $absentDays * 3 + $lateDays, // weighted discipline score
            ];
        })->sortBy('score')->values();
    }
}
