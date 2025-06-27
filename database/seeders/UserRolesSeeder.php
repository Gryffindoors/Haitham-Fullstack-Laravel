<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            ['role' => 'owner',  'created_at' => now(), 'updated_at' => now()],
            ['role' => 'supervisor',  'created_at' => now(), 'updated_at' => now()],
            ['role' => 'cashier',  'created_at' => now(), 'updated_at' => now()],
            ['role' => 'waiter',  'created_at' => now(), 'updated_at' => now()],
            ['role' => 'call_center',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
