<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = Carbon::now();

        $tables = [];

        // A1 to A20
        for ($i = 1; $i <= 20; $i++) {
            $tables[] = [
                'table_number' => 'A' . $i,
                'status_id'    => 1,                  // empty
                'created_by'   => 1,
                'updated_by'   => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        // B1 to B15
        for ($i = 1; $i <= 15; $i++) {
            $tables[] = [
                'table_number' => 'B' . $i,
                'status_id'    => 1,
                'created_by'   => 1,
                'updated_by'   => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        DB::table('tables')->insert($tables);
    }
}
