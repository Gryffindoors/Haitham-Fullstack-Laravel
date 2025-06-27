<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxBracketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('tax_brackets')->insert([
            ['min_income' =>    0.00,  'max_income' => 40000.00,  'rate' => 0.00,   'created_at' => now(), 'updated_at' => now()],
            ['min_income' => 40000.01,  'max_income' => 55000.00,  'rate' => 0.10,  'created_at' => now(), 'updated_at' => now()],
            ['min_income' => 55000.01,  'max_income' => 70000.00,  'rate' => 0.15,  'created_at' => now(), 'updated_at' => now()],
            ['min_income' => 70000.01,  'max_income' => 200000.00, 'rate' => 0.20,  'created_at' => now(), 'updated_at' => now()],
            ['min_income' => 200000.01, 'max_income' => 400000.00, 'rate' => 0.225,  'created_at' => now(), 'updated_at' => now()],
            ['min_income' => 400000.01, 'max_income' => null,     'rate' => 0.25,  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
