<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_statuses')->insert([
            ['status' => 'empty',          'created_at' => now(), 'updated_at' => now()],
            ['status' => 'reserved',       'created_at' => now(), 'updated_at' => now()],
            ['status' => 'occupied',       'created_at' => now(), 'updated_at' => now()],
            ['status' => 'out_of_order',   'created_at' => now(), 'updated_at' => now()],
            ['status' => 'needs_clearing', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
