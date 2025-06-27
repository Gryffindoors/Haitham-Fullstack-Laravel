<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        $names = [
            ['Ahmed', 'Gamal'], ['Sara', 'Ibrahim'], ['Mohamed', 'Hassan'],
            ['Laila', 'Youssef'], ['Karim', 'Tarek'], ['Nourhan', 'Fathy'],
            ['Omar', 'Mahmoud'], ['Fatma', 'Adel'], ['Hany', 'Zaki'],
            ['Dalia', 'Mostafa'], ['Walid', 'Samir'], ['Aisha', 'Fouad'],
            ['Ziad', 'Ashraf'], ['Rania', 'Nabil'], ['Mona', 'Fathi'],
            ['Youssef', 'Farouk'], ['Heba', 'Amin'], ['Salma', 'Tamer'],
            ['Mahmoud', 'Reda'], ['Marwan', 'Hussein'],
        ];

        $addresses = [
            'Nasr City, Cairo',
            'Heliopolis, Cairo',
            'Zamalek, Cairo',
            'Maadi, Cairo',
            '6th October, Giza',
            null,
            null,
            'New Cairo, Cairo',
            null,
            'Shubra, Cairo',
        ];

        $customers = [];
        foreach ($names as $i => [$first, $last]) {
            $phonePrefix = '01' . ['0', '2', '5'][rand(0, 2)];
            $phone = $phonePrefix . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);

            $createdAt = Carbon::createFromTimestamp(rand(strtotime('2023-01-01'), time()));

            $customers[] = [
                'first_name'  => $first,
                'last_name'   => $last,
                'phone_number'=> $phone,
                'address'     => $addresses[$i % count($addresses)],
                'created_by'  => rand(2, 20),
                'updated_by'  => 1,
                'created_at'  => $createdAt,
                'updated_at'  => $createdAt,
            ];
        }

        DB::table('customers')->insert($customers);
    }
}
