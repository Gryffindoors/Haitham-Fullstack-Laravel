<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'    => 'haitham',
            'password'    => bcrypt('password123'), 
            'role_id'     => 1, 
            'staff_id'    => 1, 
            'created_by'  => 1, 
            'updated_by'  => 1,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
