<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DeductionRulesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('deduction_rules')->insert([
            [
                'name' => 'Social Insurance',
                'type' => 'percentage',
                'value' => 11.00, // 11% for example
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health Insurance',
                'type' => 'fixed',
                'value' => 100.00, // flat amount
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}