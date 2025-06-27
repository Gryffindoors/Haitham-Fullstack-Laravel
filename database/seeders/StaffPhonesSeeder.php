<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StaffPhonesSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $usedPhones = [];
        $entries = [];

        for ($staffId = 1; $staffId <= 20; $staffId++) {
            $numPhones = ($staffId === 1 || rand(0, 4) === 0) ? rand(2, 3) : 1;

            for ($i = 0; $i < $numPhones; $i++) {
                do {
                    $prefix = '01' . ['0', '2', '5'][rand(0, 2)];
                    $number = $prefix . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
                } while (in_array($number, $usedPhones));

                $usedPhones[] = $number;

                $entries[] = [
                    'staff_id'     => $staffId,
                    'phone_number' => $number,
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ];
            }
        }

        DB::table('staff_phones')->insert($entries);
    }
}
