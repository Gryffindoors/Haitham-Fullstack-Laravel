<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SalariesSeeder extends Seeder
{
    public function run(): void
    {
        $salaries = [];

        // Two months of salary data
        $salaryDates = [
            '2025-04-01',
            '2025-05-01',
        ];

        // Base data per staff
        $baseData = [
            ['staff_id' => 1, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 2, 'base_salary' => 6000, 'hourly_rate' => 28.85, 'tips' => 0.0, 'deductions' => 900.0],
            ['staff_id' => 3, 'base_salary' => 8000, 'hourly_rate' => 38.46, 'tips' => 553.89, 'deductions' => 1200.0],
            ['staff_id' => 4, 'base_salary' => 5000, 'hourly_rate' => 24.04, 'tips' => 777.87, 'deductions' => 750.0],
            ['staff_id' => 5, 'base_salary' => 5000, 'hourly_rate' => 24.04, 'tips' => 488.98, 'deductions' => 750.0],
            ['staff_id' => 6, 'base_salary' => 5000, 'hourly_rate' => 24.04, 'tips' => 738.37, 'deductions' => 750.0],
            ['staff_id' => 7, 'base_salary' => 8000, 'hourly_rate' => 38.46, 'tips' => 458.25, 'deductions' => 1200.0],
            ['staff_id' => 8, 'base_salary' => 6000, 'hourly_rate' => 28.85, 'tips' => 0.0, 'deductions' => 900.0],
            ['staff_id' => 9, 'base_salary' => 5000, 'hourly_rate' => 24.04, 'tips' => 622.17, 'deductions' => 750.0],
            ['staff_id' => 10, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 11, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 12, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 13, 'base_salary' => 8000, 'hourly_rate' => 38.46, 'tips' => 555.52, 'deductions' => 1200.0],
            ['staff_id' => 14, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 15, 'base_salary' => 8000, 'hourly_rate' => 38.46, 'tips' => 703.61, 'deductions' => 1200.0],
            ['staff_id' => 16, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 17, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 18, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
            ['staff_id' => 19, 'base_salary' => 6000, 'hourly_rate' => 28.85, 'tips' => 0.0, 'deductions' => 900.0],
            ['staff_id' => 20, 'base_salary' => 10000, 'hourly_rate' => 48.08, 'tips' => 0.0, 'deductions' => 1500.0],
        ];

        foreach ($salaryDates as $salaryDate) {
            foreach ($baseData as $record) {
                $salaries[] = [
                    'staff_id' => $record['staff_id'],
                    'base_salary' => $record['base_salary'],
                    'hourly_rate' => $record['hourly_rate'],
                    'tips' => round($record['tips'] + rand(-20, 40), 2),
                    'deductions' => round($record['deductions'] + rand(-50, 100), 2),
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => Carbon::parse($salaryDate), // Salary date = payment date
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('salaries')->insert($salaries);
    }
}
