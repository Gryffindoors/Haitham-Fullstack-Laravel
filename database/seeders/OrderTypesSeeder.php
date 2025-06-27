<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_types')->insert([
            ['type' => 'table',     'created_at' => now(), 'updated_at' => now()],
            ['type' => 'delivery',  'created_at' => now(), 'updated_at' => now()],
            ['type' => 'takeaway',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
