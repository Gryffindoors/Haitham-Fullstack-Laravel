<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        // Get all menu item prices
        $menuItems = DB::table('menu_items')->select('id', 'price')->get()->keyBy('id');

        // Get all orders with ordered_at
        $orders = DB::table('orders')->select('id', 'ordered_at')->get()->keyBy('id');

        $rows = [];

        foreach ($orders as $orderId => $order) {
            $usedMenuItems = [];
            $numItems = rand(1, 4);

            for ($i = 0; $i < $numItems; $i++) {
                do {
                    $menuItemId = rand(1, 20);
                } while (in_array($menuItemId, $usedMenuItems));
                $usedMenuItems[] = $menuItemId;

                $quantity = rand(1, 3);
                $unitPrice = $menuItems[$menuItemId]->price;
                $totalPrice = $unitPrice * $quantity;

                $rows[] = [
                    'menu_item_id' => $menuItemId,
                    'quantity'     => $quantity,
                    'unit_price'   => $unitPrice,
                    'total_price'  => $totalPrice,
                    'order_id'     => $orderId,
                    'created_at'   => $order->ordered_at,
                    'updated_at'   => $order->ordered_at,
                ];
            }
        }

        DB::table('order_items')->insert($rows);
    }
}
