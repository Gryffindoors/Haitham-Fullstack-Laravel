<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InventoriesSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $items = [
            ['Flour', 'دقيق', 'g', 0.02],
            ['Sugar', 'سكر', 'g', 0.015],
            ['Butter', 'زبدة', 'g', 0.1],
            ['Eggs', 'بيض', 'piece', 2.5],
            ['Milk', 'لبن', 'ml', 0.03],
            ['Chocolate', 'شوكولاتة', 'g', 0.12],
            ['Cheese', 'جبنة', 'g', 0.2],
            ['Oil', 'زيت', 'ml', 0.025],
            ['Bread', 'خبز', 'piece', 1.5],
            ['Cream', 'كريمة', 'ml', 0.08],
            ['Coffee Beans', 'بن', 'g', 0.18],
            ['Tea Leaves', 'شاي', 'g', 0.05],
            ['Pasta', 'مكرونة', 'g', 0.04],
            ['Rice', 'أرز', 'g', 0.03],
            ['Chicken Breast', 'صدر دجاج', 'g', 0.09],
            ['Beef Patty', 'برجر لحم', 'g', 0.12],
            ['Shrimp', 'جمبري', 'g', 0.2],
            ['Tomato', 'طماطم', 'g', 0.03],
            ['Lettuce', 'خس', 'g', 0.02],
            ['Strawberry', 'فراولة', 'g', 0.07],
            ['Honey', 'عسل', 'ml', 0.1],
            ['Salt', 'ملح', 'g', 0.005],
            ['Black Pepper', 'فلفل أسود', 'g', 0.01],
            ['Water', 'مياه', 'ml', 0.001],
        ];

        $records = [];

        foreach ($items as [$name, $name_ar, $unit, $cost]) {
            $createdAt = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));

            $records[] = [
                'name'          => $name,
                'name_ar'       => $name_ar,
                'unit'          => $unit,
                'quantity'      => rand(500, 5000),
                'min_threshold' => rand(100, 300),
                'cost'          => $cost,
                'created_by'    => rand(2, 20),
                'updated_by'    => 1,
                'created_at'    => $createdAt,
                'updated_at'    => $createdAt,
            ];
        }

        DB::table('inventories')->insert($records);
    }
}
