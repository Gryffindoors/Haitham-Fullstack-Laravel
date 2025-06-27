<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuItemIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->insertSweetsIngredients();
        $this->insertMealsIngredients();
        $this->insertSnacksIngredients();
        $this->insertHotDrinksIngredients();
        $this->insertColdDrinksIngredients();
    }

    private function insertSweetsIngredients()
    {
        $now = Carbon::now();

        $rows = [
            // Molten Cake (1)
            ['menu_item_id' => 1, 'inventory_id' => 1,  'quantity' => 100], // Flour
            ['menu_item_id' => 1, 'inventory_id' => 2,  'quantity' => 80],  // Sugar
            ['menu_item_id' => 1, 'inventory_id' => 3,  'quantity' => 60],  // Butter
            ['menu_item_id' => 1, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 1, 'inventory_id' => 6,  'quantity' => 50],  // Chocolate
            ['menu_item_id' => 1, 'inventory_id' => 10, 'quantity' => 30],  // Cream

            // Cheesecake (2)
            ['menu_item_id' => 2, 'inventory_id' => 1,  'quantity' => 120], // Flour
            ['menu_item_id' => 2, 'inventory_id' => 2,  'quantity' => 100], // Sugar
            ['menu_item_id' => 2, 'inventory_id' => 3,  'quantity' => 80],  // Butter
            ['menu_item_id' => 2, 'inventory_id' => 4,  'quantity' => 2],   // Eggs
            ['menu_item_id' => 2, 'inventory_id' => 7,  'quantity' => 100], // Cheese
            ['menu_item_id' => 2, 'inventory_id' => 20, 'quantity' => 30],  // Strawberry

            // Chocolate Brownie (3)
            ['menu_item_id' => 3, 'inventory_id' => 1,  'quantity' => 90],  // Flour
            ['menu_item_id' => 3, 'inventory_id' => 2,  'quantity' => 70],  // Sugar
            ['menu_item_id' => 3, 'inventory_id' => 3,  'quantity' => 80],  // Butter
            ['menu_item_id' => 3, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 3, 'inventory_id' => 6,  'quantity' => 60],  // Chocolate
            ['menu_item_id' => 3, 'inventory_id' => 22, 'quantity' => 1],   // Salt

            // Basbousa with Cream (4)
            ['menu_item_id' => 4, 'inventory_id' => 1,  'quantity' => 150], // Flour
            ['menu_item_id' => 4, 'inventory_id' => 2,  'quantity' => 80],  // Sugar
            ['menu_item_id' => 4, 'inventory_id' => 10, 'quantity' => 50],  // Cream
            ['menu_item_id' => 4, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 4, 'inventory_id' => 5,  'quantity' => 30],  // Milk
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('menu_items_ingredients')->insert($rows);
    }
    private function insertMealsIngredients()
    {
        $now = Carbon::now();

        $rows = [
            // Grilled Chicken Plate (5)
            ['menu_item_id' => 5, 'inventory_id' => 15, 'quantity' => 200], // Chicken Breast
            ['menu_item_id' => 5, 'inventory_id' => 14, 'quantity' => 150], // Rice
            ['menu_item_id' => 5, 'inventory_id' => 18, 'quantity' => 50],  // Tomato
            ['menu_item_id' => 5, 'inventory_id' => 19, 'quantity' => 30],  // Lettuce
            ['menu_item_id' => 5, 'inventory_id' => 22, 'quantity' => 1],   // Salt
            ['menu_item_id' => 5, 'inventory_id' => 23, 'quantity' => 1],   // Black Pepper

            // Beef Burger (6)
            ['menu_item_id' => 6, 'inventory_id' => 16, 'quantity' => 150], // Beef Patty
            ['menu_item_id' => 6, 'inventory_id' => 9,  'quantity' => 1],   // Bread (bun)
            ['menu_item_id' => 6, 'inventory_id' => 7,  'quantity' => 40],  // Cheese
            ['menu_item_id' => 6, 'inventory_id' => 18, 'quantity' => 30],  // Tomato
            ['menu_item_id' => 6, 'inventory_id' => 19, 'quantity' => 20],  // Lettuce
            ['menu_item_id' => 6, 'inventory_id' => 22, 'quantity' => 1],   // Salt

            // Pasta Alfredo (7)
            ['menu_item_id' => 7, 'inventory_id' => 13, 'quantity' => 150], // Pasta
            ['menu_item_id' => 7, 'inventory_id' => 5,  'quantity' => 80],  // Milk
            ['menu_item_id' => 7, 'inventory_id' => 7,  'quantity' => 60],  // Cheese
            ['menu_item_id' => 7, 'inventory_id' => 3,  'quantity' => 40],  // Butter
            ['menu_item_id' => 7, 'inventory_id' => 15, 'quantity' => 100], // Chicken Breast
            ['menu_item_id' => 7, 'inventory_id' => 22, 'quantity' => 1],   // Salt

            // Fried Shrimp Plate (8)
            ['menu_item_id' => 8, 'inventory_id' => 17, 'quantity' => 180], // Shrimp
            ['menu_item_id' => 8, 'inventory_id' => 1,  'quantity' => 80],  // Flour
            ['menu_item_id' => 8, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 8, 'inventory_id' => 8,  'quantity' => 50],  // Oil
            ['menu_item_id' => 8, 'inventory_id' => 22, 'quantity' => 1],   // Salt
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('menu_items_ingredients')->insert($rows);
    }
    private function insertSnacksIngredients()
    {
        $now = Carbon::now();

        $rows = [
            // French Fries (9)
            ['menu_item_id' => 9, 'inventory_id' => 8,  'quantity' => 40], // Oil
            ['menu_item_id' => 9, 'inventory_id' => 18, 'quantity' => 30], // Tomato (optional garnish)
            ['menu_item_id' => 9, 'inventory_id' => 22, 'quantity' => 1],  // Salt

            // Chicken Nuggets (10)
            ['menu_item_id' => 10, 'inventory_id' => 15, 'quantity' => 100], // Chicken Breast
            ['menu_item_id' => 10, 'inventory_id' => 1,  'quantity' => 50],  // Flour
            ['menu_item_id' => 10, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 10, 'inventory_id' => 8,  'quantity' => 40],  // Oil
            ['menu_item_id' => 10, 'inventory_id' => 22, 'quantity' => 1],   // Salt

            // Cheese Rolls (11)
            ['menu_item_id' => 11, 'inventory_id' => 7,  'quantity' => 100], // Cheese
            ['menu_item_id' => 11, 'inventory_id' => 1,  'quantity' => 40],  // Flour
            ['menu_item_id' => 11, 'inventory_id' => 3,  'quantity' => 30],  // Butter
            ['menu_item_id' => 11, 'inventory_id' => 8,  'quantity' => 30],  // Oil

            // Mini Pizza Bites (12)
            ['menu_item_id' => 12, 'inventory_id' => 1,  'quantity' => 60],  // Flour
            ['menu_item_id' => 12, 'inventory_id' => 7,  'quantity' => 50],  // Cheese
            ['menu_item_id' => 12, 'inventory_id' => 18, 'quantity' => 30],  // Tomato
            ['menu_item_id' => 12, 'inventory_id' => 4,  'quantity' => 1],   // Egg
            ['menu_item_id' => 12, 'inventory_id' => 22, 'quantity' => 1],   // Salt
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('menu_items_ingredients')->insert($rows);
    }
    private function insertHotDrinksIngredients()
    {
        $now = Carbon::now();

        $rows = [
            // Espresso (13)
            ['menu_item_id' => 13, 'inventory_id' => 11, 'quantity' => 18],  // Coffee Beans
            ['menu_item_id' => 13, 'inventory_id' => 24, 'quantity' => 30],  // Water

            // Cappuccino (14)
            ['menu_item_id' => 14, 'inventory_id' => 11, 'quantity' => 18],  // Coffee Beans
            ['menu_item_id' => 14, 'inventory_id' => 5,  'quantity' => 100], // Milk
            ['menu_item_id' => 14, 'inventory_id' => 24, 'quantity' => 30],  // Water

            // Hot Chocolate (15)
            ['menu_item_id' => 15, 'inventory_id' => 6,  'quantity' => 40],  // Chocolate
            ['menu_item_id' => 15, 'inventory_id' => 5,  'quantity' => 120], // Milk
            ['menu_item_id' => 15, 'inventory_id' => 10, 'quantity' => 30],  // Cream

            // Tea with Mint (16)
            ['menu_item_id' => 16, 'inventory_id' => 12, 'quantity' => 5],   // Tea Leaves
            ['menu_item_id' => 16, 'inventory_id' => 24, 'quantity' => 150], // Water
            ['menu_item_id' => 16, 'inventory_id' => 19, 'quantity' => 10],  // Lettuce (used as mint placeholder)
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('menu_items_ingredients')->insert($rows);
    }
    private function insertColdDrinksIngredients()
    {
        $now = Carbon::now();

        $rows = [
            // Iced Latte (17)
            ['menu_item_id' => 17, 'inventory_id' => 11, 'quantity' => 18],  // Coffee Beans
            ['menu_item_id' => 17, 'inventory_id' => 5,  'quantity' => 100], // Milk
            ['menu_item_id' => 17, 'inventory_id' => 24, 'quantity' => 100], // Water (ice)

            // Lemon Mint Juice (18)
            ['menu_item_id' => 18, 'inventory_id' => 18, 'quantity' => 40],  // Tomato (lemon placeholder)
            ['menu_item_id' => 18, 'inventory_id' => 19, 'quantity' => 20],  // Lettuce (mint placeholder)
            ['menu_item_id' => 18, 'inventory_id' => 24, 'quantity' => 150], // Water

            // Cold Brew Coffee (19)
            ['menu_item_id' => 19, 'inventory_id' => 11, 'quantity' => 25],  // Coffee Beans
            ['menu_item_id' => 19, 'inventory_id' => 24, 'quantity' => 180], // Water

            // Strawberry Smoothie (20)
            ['menu_item_id' => 20, 'inventory_id' => 20, 'quantity' => 100], // Strawberry
            ['menu_item_id' => 20, 'inventory_id' => 5,  'quantity' => 120], // Milk
            ['menu_item_id' => 20, 'inventory_id' => 21, 'quantity' => 10],  // Honey
            ['menu_item_id' => 20, 'inventory_id' => 24, 'quantity' => 80],  // Water
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('menu_items_ingredients')->insert($rows);
    }
}
