<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'Food Preparation', 'name_ar' => 'تحضير الطعام', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wait Staff', 'name_ar' => 'طاقم التقديم', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cashiers', 'name_ar' => 'الكاشير', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivery', 'name_ar' => 'التوصيل', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Administration', 'name_ar' => 'الإدارة', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Support Staff', 'name_ar' => 'الخدمات العامة', 'created_at' => now(), 'updated_at' => now()], 
            ['name' => 'Inventory & Purchasing', 'name_ar' => 'المشتريات والمخزون', 'created_at' => now(), 'updated_at' => now()], 
        ]);
    }
}
