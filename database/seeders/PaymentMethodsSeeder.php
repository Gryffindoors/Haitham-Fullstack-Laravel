<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['name' => 'card', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'cash', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'wallet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'bank transfer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pos', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
