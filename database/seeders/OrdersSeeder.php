<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $this->insertOrdersJune17();
        $this->insertOrdersJune18();
        $this->insertOrdersJune19();
        $this->insertOrdersJune20();
        $this->insertOrdersJune21();
        $this->insertOrdersJune22();
        $this->insertOrdersJune23();
    }

    private function insertOrdersJune17()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 17, 9, 0, 0); // Start from 9:00 AM

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540)); // spread through the day
            $isCancelled = rand(1, 10) <= 2; // ~20% cancelled

            $statusId = $isCancelled ? 5 : rand(3, 4); // delivered or completed unless cancelled
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null; // only for dine-in

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15, // Wait Staff
                2 => 17, // Administration
                3 => 14, // Cashiers
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune18()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 18, 9, 0, 0); // Start from 9:00 AM

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540)); // 9:00 to 18:00
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15, // Wait Staff
                2 => 17, // Administration
                3 => 14, // Cashiers
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune19()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 19, 9, 0, 0); // 9:00 AM start

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540));
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15, // Wait Staff
                2 => 17, // Administration
                3 => 14, // Cashiers
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune20()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 20, 9, 0, 0); // 9:00 AM

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540));
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15,
                2 => 17,
                3 => 14,
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune21()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 21, 9, 0, 0); // Saturday

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540));
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15,
                2 => 17,
                3 => 14,
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune22()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 22, 9, 0, 0); // Sunday

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540));
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15,
                2 => 17,
                3 => 14,
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
    private function insertOrdersJune23()
    {
        $orders = [];
        $baseDate = Carbon::create(2025, 6, 23, 9, 0, 0); // Monday

        for ($i = 0; $i < 10; $i++) {
            $orderedAt = $baseDate->copy()->addMinutes(rand(0, 540));
            $isCancelled = rand(1, 10) <= 2;

            $statusId = $isCancelled ? 5 : rand(3, 4);
            $completedAt = $isCancelled ? null : $orderedAt->copy()->addMinutes(rand(30, 120));

            $orderTypeId = rand(1, 3);
            $tableId = $orderTypeId === 1 ? rand(1, 35) : null;

            $spcialOfferId = rand(1, 10) <= 3 ? rand(1, 5) : null;

            $createdBy = rand(2, 20);
            $updatedBy = match ($orderTypeId) {
                1 => 15,
                2 => 17,
                3 => 14,
            };

            $orders[] = [
                'customer_id'      => rand(1, 20),
                'order_type_id'    => $orderTypeId,
                'table_id'         => $tableId,
                'status_id'        => $statusId,
                'spcial_offer_id'  => $spcialOfferId,
                'ordered_at'       => $orderedAt,
                'completed_at'     => $completedAt,
                'created_by'       => $createdBy,
                'updated_by'       => $updatedBy,
                'total'            => rand(100, 500),
                'created_at'       => $orderedAt,
                'updated_at'       => $orderedAt,
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
