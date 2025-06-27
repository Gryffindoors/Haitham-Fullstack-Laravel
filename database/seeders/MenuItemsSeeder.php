<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->insertSweets();
        $this->insertMeals();
        $this->insertSnacks();
        $this->insertHotDrinks();
        $this->insertColdDrinks();
    }

    private function insertSweets()
    {
        $now = \Carbon\Carbon::now();

        $sweets = [
            [
                'name' => 'Molten Cake',
                'name_ar' => 'مولتن كيك',
                'description' => 'Warm chocolate cake with a molten center served with vanilla ice cream.',
                'description_ar' => 'كيك شوكولاتة ساخن بحشوة سائلة يقدم مع آيس كريم فانيليا.',
                'image_url' => null, 
                'category_id' => 3,
                'price' => 45.00,
            ],
            [
                'name' => 'Cheesecake',
                'name_ar' => 'تشيز كيك',
                'description' => 'Classic baked cheesecake with strawberry topping.',
                'description_ar' => 'تشيز كيك مخبوز تقليدي مع صوص الفراولة.',
                'image_url' => null,
                'category_id' => 3,
                'price' => 50.00,
            ],
            [
                'name' => 'Chocolate Brownie',
                'name_ar' => 'براوني شوكولاتة',
                'description' => 'Rich chocolate brownie served warm with nuts.',
                'description_ar' => 'براوني شوكولاتة غني يقدم دافئ مع مكسرات.',
                'image_url' => null,
                'category_id' => 3,
                'price' => 38.00,
            ],
            [
                'name' => 'Basbousa with Cream',
                'name_ar' => 'بسبوسة بالقشطة',
                'description' => 'Traditional Egyptian semolina cake with cream filling.',
                'description_ar' => 'بسبوسة مصرية تقليدية محشوة بالقشطة.',
                'image_url' => null,
                'category_id' => 3,
                'price' => 30.00,
            ],
        ];

        foreach ($sweets as &$item) {
            $item['created_by'] = rand(2, 20);
            $item['updated_by'] = 1;
            $item['created_at'] = $item['updated_at'] = \Carbon\Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));
        }

        DB::table('menu_items')->insert($sweets);
    }
    private function insertMeals()
    {
        $now = Carbon::now();

        $meals = [
            [
                'name' => 'Grilled Chicken Plate',
                'name_ar' => 'وجبة دجاج مشوي',
                'description' => 'Grilled chicken breast served with rice and vegetables.',
                'description_ar' => 'صدر دجاج مشوي يقدم مع أرز وخضار.',
                'image_url' => null,
                'category_id' => 4,
                'price' => 85.00,
            ],
            [
                'name' => 'Beef Burger',
                'name_ar' => 'برجر لحم',
                'description' => 'Classic beef burger with lettuce, tomato, and fries.',
                'description_ar' => 'برجر لحم كلاسيكي مع خس وطماطم وبطاطس مقلية.',
                'image_url' => null,
                'category_id' => 4,
                'price' => 75.00,
            ],
            [
                'name' => 'Pasta Alfredo',
                'name_ar' => 'باستا ألفريدو',
                'description' => 'Creamy Alfredo pasta with mushrooms and grilled chicken.',
                'description_ar' => 'باستا بصوص ألفريدو الكريمي مع المشروم والدجاج المشوي.',
                'image_url' => null,
                'category_id' => 4,
                'price' => 90.00,
            ],
            [
                'name' => 'Fried Shrimp Plate',
                'name_ar' => 'وجبة جمبري مقلي',
                'description' => 'Crispy fried shrimp served with tartar sauce and fries.',
                'description_ar' => 'جمبري مقلي مقرمش يقدم مع صوص التارتار وبطاطس مقلية.',
                'image_url' => null,
                'category_id' => 4,
                'price' => 110.00,
            ],
        ];

        foreach ($meals as &$item) {
            $item['created_by'] = rand(2, 20);
            $item['updated_by'] = 1;
            $item['created_at'] = $item['updated_at'] = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));
        }

        DB::table('menu_items')->insert($meals);
    }
    private function insertSnacks()
    {
        $now = Carbon::now();

        $snacks = [
            [
                'name' => 'French Fries',
                'name_ar' => 'بطاطس مقلية',
                'description' => 'Golden crispy French fries served with ketchup.',
                'description_ar' => 'بطاطس مقلية مقرمشة تقدم مع الكاتشب.',
                'image_url' => null,
                'category_id' => 5,
                'price' => 25.00,
            ],
            [
                'name' => 'Chicken Nuggets',
                'name_ar' => 'ناجتس دجاج',
                'description' => 'Breaded chicken nuggets served with dipping sauce.',
                'description_ar' => 'قطع دجاج مقلية تقدم مع صوص.',
                'image_url' => null,
                'category_id' => 5,
                'price' => 35.00,
            ],
            [
                'name' => 'Cheese Rolls',
                'name_ar' => 'رولات الجبنة',
                'description' => 'Fried rolls filled with mixed cheeses.',
                'description_ar' => 'رولات مقلية محشوة بأنواع جبن مختلفة.',
                'image_url' => null,
                'category_id' => 5,
                'price' => 28.00,
            ],
            [
                'name' => 'Mini Pizza Bites',
                'name_ar' => 'ميني بيتزا',
                'description' => 'Small bite-sized pizzas with assorted toppings.',
                'description_ar' => 'قطع بيتزا صغيرة مع إضافات متنوعة.',
                'image_url' => null,
                'category_id' => 5,
                'price' => 40.00,
            ],
        ];

        foreach ($snacks as &$item) {
            $item['created_by'] = rand(2, 20);
            $item['updated_by'] = 1;
            $item['created_at'] = $item['updated_at'] = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));
        }

        DB::table('menu_items')->insert($snacks);
    }
    private function insertHotDrinks()
    {
        $now = Carbon::now();

        $hotDrinks = [
            [
                'name' => 'Espresso',
                'name_ar' => 'إسبريسو',
                'description' => 'Strong and rich Italian-style espresso shot.',
                'description_ar' => 'شوت إسبريسو إيطالي قوي وغني.',
                'image_url' => null,
                'category_id' => 6,
                'price' => 25.00,
            ],
            [
                'name' => 'Cappuccino',
                'name_ar' => 'كابتشينو',
                'description' => 'Espresso with steamed milk and foamed milk on top.',
                'description_ar' => 'إسبريسو مع حليب مبخر ورغوة حليب.',
                'image_url' => null,
                'category_id' => 6,
                'price' => 35.00,
            ],
            [
                'name' => 'Hot Chocolate',
                'name_ar' => 'شوكولاتة ساخنة',
                'description' => 'Creamy hot chocolate drink topped with whipped cream.',
                'description_ar' => 'مشروب شوكولاتة ساخن بكريمة مخفوقة.',
                'image_url' => null,
                'category_id' => 6,
                'price' => 30.00,
            ],
            [
                'name' => 'Tea with Mint',
                'name_ar' => 'شاي بالنعناع',
                'description' => 'Traditional black tea served with fresh mint leaves.',
                'description_ar' => 'شاي أسود تقليدي يقدم مع أوراق نعناع طازجة.',
                'image_url' => null,
                'category_id' => 6,
                'price' => 18.00,
            ],
        ];

        foreach ($hotDrinks as &$item) {
            $item['created_by'] = rand(2, 20);
            $item['updated_by'] = 1;
            $item['created_at'] = $item['updated_at'] = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));
        }

        DB::table('menu_items')->insert($hotDrinks);
    }
    private function insertColdDrinks()
    {
        $now = Carbon::now();

        $coldDrinks = [
            [
                'name' => 'Iced Latte',
                'name_ar' => 'لاتيه مثلج',
                'description' => 'Chilled espresso with cold milk and ice.',
                'description_ar' => 'إسبريسو بارد مع حليب ومكعبات ثلج.',
                'image_url' => null,
                'category_id' => 7,
                'price' => 38.00,
            ],
            [
                'name' => 'Lemon Mint Juice',
                'name_ar' => 'عصير ليمون بالنعناع',
                'description' => 'Refreshing lemon juice blended with fresh mint.',
                'description_ar' => 'عصير ليمون منعش ممزوج بالنعناع الطازج.',
                'image_url' => null,
                'category_id' => 7,
                'price' => 28.00,
            ],
            [
                'name' => 'Cold Brew Coffee',
                'name_ar' => 'قهوة كولد برو',
                'description' => 'Smooth cold brew coffee served over ice.',
                'description_ar' => 'قهوة كولد برو ناعمة تقدم مع ثلج.',
                'image_url' => null,
                'category_id' => 7,
                'price' => 40.00,
            ],
            [
                'name' => 'Strawberry Smoothie',
                'name_ar' => 'سموذي فراولة',
                'description' => 'Blended strawberries with milk and honey.',
                'description_ar' => 'فراولة ممزوجة مع الحليب والعسل.',
                'image_url' => null,
                'category_id' => 7,
                'price' => 35.00,
            ],
        ];

        foreach ($coldDrinks as &$item) {
            $item['created_by'] = rand(2, 20);
            $item['updated_by'] = 1;
            $item['created_at'] = $item['updated_at'] = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));
        }

        DB::table('menu_items')->insert($coldDrinks);
    }
}
