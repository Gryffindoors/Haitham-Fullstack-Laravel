<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttendancesSeeder extends Seeder
{
    public function run(): void
    {
        $attendances = [];
        $startDate = Carbon::create(2025, 6, 1);
        $staffCount = 20;

        $shiftTimings = [
            1 => ['start' => '08:00:00', 'end' => '16:00:00'], // Shift A
            2 => ['start' => '16:00:00', 'end' => '00:00:00'], // Shift B
            3 => ['start' => '00:00:00', 'end' => '08:00:00'], // Shift C
        ];

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();

            for ($staffId = 1; $staffId <= $staffCount; $staffId++) {
                $statusRoll = rand(1, 10);
                $status = 'Present';
                $note = null;

                if ($statusRoll <= 2) {
                    $status = 'Late';
                    $note = 'Arrived late due to traffic';
                } elseif ($statusRoll === 3) {
                    $status = 'Absent';
                    $note = 'No call no show';
                }

                $timetableId = rand(1, 3);
                $shift = $shiftTimings[$timetableId];
                $start = ($status === 'Late') ? Carbon::parse($shift['start'])->addMinutes(30)->format('H:i:s') : $shift['start'];
                $end = $shift['end'];

                $attendances[] = [
                    'staff_id' => $staffId,
                    'timetable_id' => $timetableId,
                    'day' => $date,
                    'start' => $start,
                    'end' => $end,
                    'status' => $status,
                    'note' => $note,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('attendances')->insert($attendances);
    }
}
