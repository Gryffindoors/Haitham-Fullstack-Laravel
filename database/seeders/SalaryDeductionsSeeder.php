<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryDeductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salary_deductions')->insert([
            ['staff_id' => 2, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 3, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 4, 'deduction_date' => '2025-06-01', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 8, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 10, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 16, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 17, 'deduction_date' => '2025-06-01', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 20, 'deduction_date' => '2025-06-01', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 3, 'deduction_date' => '2025-06-02', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 4, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 9, 'deduction_date' => '2025-06-02', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 10, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 11, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 12, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 14, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 17, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 20, 'deduction_date' => '2025-06-02', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 4, 'deduction_date' => '2025-06-03', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 12, 'deduction_date' => '2025-06-03', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 18, 'deduction_date' => '2025-06-03', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 6, 'deduction_date' => '2025-06-04', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 8, 'deduction_date' => '2025-06-04', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 11, 'deduction_date' => '2025-06-04', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 12, 'deduction_date' => '2025-06-04', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 13, 'deduction_date' => '2025-06-04', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 18, 'deduction_date' => '2025-06-04', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 1, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 2, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 4, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 11, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 14, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 18, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 19, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 20, 'deduction_date' => '2025-06-05', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 2, 'deduction_date' => '2025-06-06', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 14, 'deduction_date' => '2025-06-06', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 3, 'deduction_date' => '2025-06-07', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 4, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 6, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 8, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 9, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 10, 'deduction_date' => '2025-06-07', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 12, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 14, 'deduction_date' => '2025-06-07', 'amount' => 50.00, 'reason' => 'late', 'note' => 'Late by 480 mins', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
            ['staff_id' => 16, 'deduction_date' => '2025-06-07', 'amount' => 200.00, 'reason' => 'absent', 'note' => 'No call no show', 'created_by' => 1, 'created_at' => '2025-06-25 19:37:21', 'updated_at' => '2025-06-25 19:37:21'],
        ]);
    }
}
