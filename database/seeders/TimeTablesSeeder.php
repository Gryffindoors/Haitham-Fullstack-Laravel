<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('time_tables')->insert([
            [
                'name' => 'Shift A',
                'name_ar' => 'الوردية أ',
                'start' => '08:00:00',
                'end' => '16:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shift B',
                'name_ar' => 'الوردية ب',
                'start' => '16:00:00',
                'end' => '00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shift C',
                'name_ar' => 'الوردية ج',
                'start' => '00:00:00',
                'end' => '08:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
