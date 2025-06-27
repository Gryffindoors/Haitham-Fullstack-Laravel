<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateDepartmentManagersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->where('id', 1)->update(['manager_id' => 16]); // Mustafa Ahmed
        DB::table('departments')->where('id', 2)->update(['manager_id' => 15]); // Hoda Gamal
        DB::table('departments')->where('id', 3)->update(['manager_id' => 14]); // Amr Sherif
        DB::table('departments')->where('id', 4)->update(['manager_id' => 2]);  // Ahmed Hassan
        DB::table('departments')->where('id', 5)->update(['manager_id' => 17]); // Aisha Farouk
        DB::table('departments')->where('id', 6)->update(['manager_id' => 6]);  // Omar Said
        DB::table('departments')->where('id', 7)->update(['manager_id' => 4]);  // Fatma Mahmoud
    }
}
