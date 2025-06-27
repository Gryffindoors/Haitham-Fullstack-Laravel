<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuCategoriesSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Insert top-level categories
        $foodId = DB::table('menu_categories')->insertGetId([
            'name'       => 'Food',
            'name_ar'    => 'طعام',
            'parent_id'  => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $drinksId = DB::table('menu_categories')->insertGetId([
            'name'       => 'Drinks',
            'name_ar'    => 'مشروبات',
            'parent_id'  => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Insert subcategories
        DB::table('menu_categories')->insert([
            [
                'name' => 'Sweets', 'name_ar' => 'حلويات',
                'parent_id' => $foodId,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'name' => 'Meals', 'name_ar' => 'وجبات',
                'parent_id' => $foodId,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'name' => 'Snacks', 'name_ar' => 'سناكس',
                'parent_id' => $foodId,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'name' => 'Hot', 'name_ar' => 'ساخنة',
                'parent_id' => $drinksId,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'name' => 'Cold', 'name_ar' => 'باردة',
                'parent_id' => $drinksId,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }
}
