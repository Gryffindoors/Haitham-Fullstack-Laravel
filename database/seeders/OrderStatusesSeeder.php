<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['status' => 'pending',    'created_at' => now(), 'updated_at' => now()],
            ['status' => 'preparing',  'created_at' => now(), 'updated_at' => now()],
            ['status' => 'delivered',  'created_at' => now(), 'updated_at' => now()],
            ['status' => 'completed',  'created_at' => now(), 'updated_at' => now()],
            ['status' => 'cancelled',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
