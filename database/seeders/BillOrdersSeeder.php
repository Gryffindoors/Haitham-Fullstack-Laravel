<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bill_orders')->insert([
            ['bill_id' => 191, 'order_id' => 1, 'created_at' => '2025-06-17 15:18:00', 'updated_at' => '2025-06-17 15:18:00'],
            ['bill_id' => 192, 'order_id' => 2, 'created_at' => '2025-06-17 16:12:00', 'updated_at' => '2025-06-17 16:12:00'],
            ['bill_id' => 193, 'order_id' => 3, 'created_at' => '2025-06-17 15:38:00', 'updated_at' => '2025-06-17 15:38:00'],
            ['bill_id' => 194, 'order_id' => 4, 'created_at' => '2025-06-17 11:53:00', 'updated_at' => '2025-06-17 11:53:00'],
            ['bill_id' => 195, 'order_id' => 5, 'created_at' => '2025-06-17 15:24:00', 'updated_at' => '2025-06-17 15:24:00'],
            ['bill_id' => 196, 'order_id' => 6, 'created_at' => '2025-06-17 15:15:00', 'updated_at' => '2025-06-17 15:15:00'],
            ['bill_id' => 196, 'order_id' => 7, 'created_at' => '2025-06-17 17:35:00', 'updated_at' => '2025-06-17 17:35:00'],
            ['bill_id' => 197, 'order_id' => 8, 'created_at' => '2025-06-17 13:16:00', 'updated_at' => '2025-06-17 13:16:00'],
            ['bill_id' => 198, 'order_id' => 9, 'created_at' => '2025-06-17 14:29:00', 'updated_at' => '2025-06-17 14:29:00'],
            ['bill_id' => 199, 'order_id' => 10, 'created_at' => '2025-06-17 13:48:00', 'updated_at' => '2025-06-17 13:48:00'],
            ['bill_id' => 200, 'order_id' => 11, 'created_at' => '2025-06-18 12:06:00', 'updated_at' => '2025-06-18 12:06:00'],
            ['bill_id' => 201, 'order_id' => 12, 'created_at' => '2025-06-18 11:59:00', 'updated_at' => '2025-06-18 11:59:00'],
            ['bill_id' => 202, 'order_id' => 13, 'created_at' => '2025-06-18 09:58:00', 'updated_at' => '2025-06-18 09:58:00'],
            ['bill_id' => 202, 'order_id' => 14, 'created_at' => '2025-06-18 13:21:00', 'updated_at' => '2025-06-18 13:21:00'],
            ['bill_id' => 202, 'order_id' => 15, 'created_at' => '2025-06-18 12:40:00', 'updated_at' => '2025-06-18 12:40:00'],
            ['bill_id' => 202, 'order_id' => 16, 'created_at' => '2025-06-18 09:17:00', 'updated_at' => '2025-06-18 09:17:00'],
            ['bill_id' => 203, 'order_id' => 17, 'created_at' => '2025-06-18 13:07:00', 'updated_at' => '2025-06-18 13:07:00'],
            ['bill_id' => 204, 'order_id' => 18, 'created_at' => '2025-06-18 15:57:00', 'updated_at' => '2025-06-18 15:57:00'],
            ['bill_id' => 205, 'order_id' => 19, 'created_at' => '2025-06-18 12:34:00', 'updated_at' => '2025-06-18 12:34:00'],
            ['bill_id' => 206, 'order_id' => 20, 'created_at' => '2025-06-18 10:53:00', 'updated_at' => '2025-06-18 10:53:00'],
            ['bill_id' => 207, 'order_id' => 21, 'created_at' => '2025-06-19 13:19:00', 'updated_at' => '2025-06-19 13:19:00'],
            ['bill_id' => 208, 'order_id' => 22, 'created_at' => '2025-06-19 09:02:00', 'updated_at' => '2025-06-19 09:02:00'],
            ['bill_id' => 209, 'order_id' => 23, 'created_at' => '2025-06-19 17:19:00', 'updated_at' => '2025-06-19 17:19:00'],
            ['bill_id' => 210, 'order_id' => 24, 'created_at' => '2025-06-19 17:07:00', 'updated_at' => '2025-06-19 17:07:00'],
            ['bill_id' => 211, 'order_id' => 25, 'created_at' => '2025-06-19 10:38:00', 'updated_at' => '2025-06-19 10:38:00'],
            ['bill_id' => 212, 'order_id' => 26, 'created_at' => '2025-06-19 11:24:00', 'updated_at' => '2025-06-19 11:24:00'],
            ['bill_id' => 213, 'order_id' => 27, 'created_at' => '2025-06-19 15:48:00', 'updated_at' => '2025-06-19 15:48:00'],
            ['bill_id' => 214, 'order_id' => 28, 'created_at' => '2025-06-19 10:35:00', 'updated_at' => '2025-06-19 10:35:00'],
            ['bill_id' => 214, 'order_id' => 29, 'created_at' => '2025-06-19 10:56:00', 'updated_at' => '2025-06-19 10:56:00'],
            ['bill_id' => 215, 'order_id' => 30, 'created_at' => '2025-06-19 15:05:00', 'updated_at' => '2025-06-19 15:05:00'],
            ['bill_id' => 216, 'order_id' => 31, 'created_at' => '2025-06-20 15:54:00', 'updated_at' => '2025-06-20 15:54:00'],
            ['bill_id' => 217, 'order_id' => 32, 'created_at' => '2025-06-20 09:46:00', 'updated_at' => '2025-06-20 09:46:00'],
            ['bill_id' => 218, 'order_id' => 33, 'created_at' => '2025-06-20 12:06:00', 'updated_at' => '2025-06-20 12:06:00'],
            ['bill_id' => 219, 'order_id' => 34, 'created_at' => '2025-06-20 17:22:00', 'updated_at' => '2025-06-20 17:22:00'],
            ['bill_id' => 220, 'order_id' => 35, 'created_at' => '2025-06-20 17:11:00', 'updated_at' => '2025-06-20 17:11:00'],
            ['bill_id' => 221, 'order_id' => 36, 'created_at' => '2025-06-20 13:25:00', 'updated_at' => '2025-06-20 13:25:00'],
            ['bill_id' => 222, 'order_id' => 37, 'created_at' => '2025-06-20 16:06:00', 'updated_at' => '2025-06-20 16:06:00'],
            ['bill_id' => 223, 'order_id' => 38, 'created_at' => '2025-06-20 16:27:00', 'updated_at' => '2025-06-20 16:27:00'],
            ['bill_id' => 224, 'order_id' => 39, 'created_at' => '2025-06-20 14:12:00', 'updated_at' => '2025-06-20 14:12:00'],
            ['bill_id' => 225, 'order_id' => 40, 'created_at' => '2025-06-20 17:32:00', 'updated_at' => '2025-06-20 17:32:00'],
            ['bill_id' => 226, 'order_id' => 41, 'created_at' => '2025-06-21 15:30:00', 'updated_at' => '2025-06-21 15:30:00'],
            ['bill_id' => 227, 'order_id' => 42, 'created_at' => '2025-06-21 11:47:00', 'updated_at' => '2025-06-21 11:47:00'],
            ['bill_id' => 228, 'order_id' => 43, 'created_at' => '2025-06-21 10:52:00', 'updated_at' => '2025-06-21 10:52:00'],
            ['bill_id' => 229, 'order_id' => 44, 'created_at' => '2025-06-21 11:35:00', 'updated_at' => '2025-06-21 11:35:00'],
            ['bill_id' => 229, 'order_id' => 45, 'created_at' => '2025-06-21 10:14:00', 'updated_at' => '2025-06-21 10:14:00'],
            ['bill_id' => 229, 'order_id' => 46, 'created_at' => '2025-06-21 15:50:00', 'updated_at' => '2025-06-21 15:50:00'],
            ['bill_id' => 229, 'order_id' => 47, 'created_at' => '2025-06-21 12:10:00', 'updated_at' => '2025-06-21 12:10:00'],
            ['bill_id' => 230, 'order_id' => 48, 'created_at' => '2025-06-21 12:40:00', 'updated_at' => '2025-06-21 12:40:00'],
            ['bill_id' => 231, 'order_id' => 49, 'created_at' => '2025-06-21 12:43:00', 'updated_at' => '2025-06-21 12:43:00'],
            ['bill_id' => 232, 'order_id' => 50, 'created_at' => '2025-06-21 17:11:00', 'updated_at' => '2025-06-21 17:11:00'],
            ['bill_id' => 233, 'order_id' => 51, 'created_at' => '2025-06-22 14:18:00', 'updated_at' => '2025-06-22 14:18:00'],
            ['bill_id' => 234, 'order_id' => 52, 'created_at' => '2025-06-22 16:50:00', 'updated_at' => '2025-06-22 16:50:00'],
            ['bill_id' => 235, 'order_id' => 53, 'created_at' => '2025-06-22 15:52:00', 'updated_at' => '2025-06-22 15:52:00'],
            ['bill_id' => 236, 'order_id' => 54, 'created_at' => '2025-06-22 16:15:00', 'updated_at' => '2025-06-22 16:15:00'],
            ['bill_id' => 237, 'order_id' => 55, 'created_at' => '2025-06-22 13:55:00', 'updated_at' => '2025-06-22 13:55:00'],
            ['bill_id' => 238, 'order_id' => 56, 'created_at' => '2025-06-22 11:47:00', 'updated_at' => '2025-06-22 11:47:00'],
            ['bill_id' => 239, 'order_id' => 57, 'created_at' => '2025-06-22 14:53:00', 'updated_at' => '2025-06-22 14:53:00'],
            ['bill_id' => 240, 'order_id' => 58, 'created_at' => '2025-06-22 10:09:00', 'updated_at' => '2025-06-22 10:09:00'],
            ['bill_id' => 241, 'order_id' => 59, 'created_at' => '2025-06-22 14:29:00', 'updated_at' => '2025-06-22 14:29:00'],
            ['bill_id' => 242, 'order_id' => 60, 'created_at' => '2025-06-22 11:08:00', 'updated_at' => '2025-06-22 11:08:00'],
            ['bill_id' => 243, 'order_id' => 61, 'created_at' => '2025-06-23 09:09:00', 'updated_at' => '2025-06-23 09:09:00'],
            ['bill_id' => 244, 'order_id' => 62, 'created_at' => '2025-06-23 09:18:00', 'updated_at' => '2025-06-23 09:18:00'],
            ['bill_id' => 245, 'order_id' => 63, 'created_at' => '2025-06-23 13:53:00', 'updated_at' => '2025-06-23 13:53:00'],
            ['bill_id' => 246, 'order_id' => 64, 'created_at' => '2025-06-23 12:23:00', 'updated_at' => '2025-06-23 12:23:00'],
            ['bill_id' => 247, 'order_id' => 65, 'created_at' => '2025-06-23 16:14:00', 'updated_at' => '2025-06-23 16:14:00'],
            ['bill_id' => 247, 'order_id' => 66, 'created_at' => '2025-06-23 13:52:00', 'updated_at' => '2025-06-23 13:52:00'],
            ['bill_id' => 247, 'order_id' => 67, 'created_at' => '2025-06-23 17:00:00', 'updated_at' => '2025-06-23 17:00:00'],
            ['bill_id' => 248, 'order_id' => 68, 'created_at' => '2025-06-23 13:26:00', 'updated_at' => '2025-06-23 13:26:00'],
            ['bill_id' => 249, 'order_id' => 69, 'created_at' => '2025-06-23 10:30:00', 'updated_at' => '2025-06-23 10:30:00'],
            ['bill_id' => 250, 'order_id' => 70, 'created_at' => '2025-06-23 17:01:00', 'updated_at' => '2025-06-23 17:01:00'],
        ]);
    }
}
