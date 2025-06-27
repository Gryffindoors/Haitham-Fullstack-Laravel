<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TableLocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = Carbon::now();
        $locations = [];

        // A1 to A20
        for ($i = 1; $i <= 20; $i++) {
            $locations[] = [
                'location_code'    => 'A' . $i,
                'capacity'         => $i <= 10 ? 6 : 4,
                'is_reserved'      => false,
                'reserved_from'    => null,
                'reserved_until'   => null,
                'reservation_note' => null,
                'is_active'        => true,
                'note'             => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ];
        }

        // B1 to B15 (all capacity 6)
        for ($i = 1; $i <= 15; $i++) {
            $locations[] = [
                'location_code'    => 'B' . $i,
                'capacity'         => 6,
                'is_reserved'      => false,
                'reserved_from'    => null,
                'reserved_until'   => null,
                'reservation_note' => null,
                'is_active'        => true,
                'note'             => null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ];
        }

        DB::table('table_locations')->insert($locations);
    }
}
