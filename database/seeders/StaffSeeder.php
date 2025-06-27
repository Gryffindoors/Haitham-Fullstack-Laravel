<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'first_name' => 'Haitham',
                'last_name' => 'Fowaty',
                'national_id' => '28805075211194',
                'address' => '15 Nasr St, Maadi, Cairo',
                'department_id' => 5,
                'timetable_id' => 2,
                'employment_date' => '2019-01-19',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Ahmed',
                'last_name' => 'Hassan',
                'national_id' => '29809091619227',
                'address' => 'Apt 7, Bldg 3, El Rehab City, New Cairo',
                'department_id' => 4,
                'timetable_id' => 3,
                'employment_date' => '2022-04-09',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Mohamed',
                'last_name' => 'Ali',
                'national_id' => '29502038062020',
                'address' => '22 Pyramids Rd, Giza, Cairo',
                'department_id' => 7,
                'timetable_id' => 2,
                'employment_date' => '2020-07-03',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Fatma',
                'last_name' => 'Mahmoud',
                'national_id' => '30101274180187',
                'address' => 'Apt 7, Bldg 3, El Rehab City, New Cairo',
                'department_id' => 6,
                'timetable_id' => 2,
                'employment_date' => '2024-10-06',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Nourhan',
                'last_name' => 'Ibrahim',
                'national_id' => '28804140294444',
                'address' => 'Villa 5, Katameya Heights, New Cairo',
                'department_id' => 7,
                'timetable_id' => 2,
                'employment_date' => '2025-03-24',
                'termination_date' => '2025-03-30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Omar',
                'last_name' => 'Said',
                'national_id' => '30204026376165',
                'address' => '8 Tahrir Square, Downtown, Cairo',
                'department_id' => 6,
                'timetable_id' => 2,
                'employment_date' => '2023-02-06',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Salma',
                'last_name' => 'Tarek',
                'national_id' => '29604308777707',
                'address' => '34 Mohandessin St, Mohandessin, Giza, Cairo',
                'department_id' => 2,
                'timetable_id' => 3,
                'employment_date' => '2021-05-13',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Khaled',
                'last_name' => 'Adel',
                'national_id' => '28212249090867',
                'address' => '10 Dokki St, Dokki, Giza, Cairo',
                'department_id' => 4,
                'timetable_id' => 2,
                'employment_date' => '2020-08-01',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'Mostafa',
                'national_id' => '28810094789691',
                'address' => 'Bldg 12, Garden City, Cairo',
                'department_id' => 6,
                'timetable_id' => 2,
                'employment_date' => '2024-08-04',
                'termination_date' => '2025-02-17',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Youssef',
                'last_name' => 'Emad',
                'national_id' => '30406113427975',
                'address' => '5 Al Ahram St, Heliopolis, Cairo',
                'department_id' => 5,
                'timetable_id' => 3,
                'employment_date' => '2025-05-13',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Dalia',
                'last_name' => 'Hany',
                'national_id' => '28510033455813',
                'address' => '18 El Nozha St, Nasr City, Cairo',
                'department_id' => 3,
                'timetable_id' => 2,
                'employment_date' => '2021-12-15',
                'termination_date' => '2022-08-09',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Karim',
                'last_name' => 'Walid',
                'national_id' => '30302079146416',
                'address' => 'Apt 9, Zamalek Towers, Zamalek, Cairo',
                'department_id' => 1,
                'timetable_id' => 3,
                'employment_date' => '2024-05-17',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Mona',
                'last_name' => 'Fathy',
                'national_id' => '29706022495768',
                'address' => '7 Corniche El Nil, Maadi, Cairo',
                'department_id' => 2,
                'timetable_id' => 1,
                'employment_date' => '2021-12-21',
                'termination_date' => '2023-10-30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Amr',
                'last_name' => 'Sherif',
                'national_id' => '30206258196321',
                'address' => '25 Abbas El Akkad St, Nasr City, Cairo',
                'department_id' => 3,
                'timetable_id' => 1,
                'employment_date' => '2020-06-23',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Hoda',
                'last_name' => 'Gamal',
                'national_id' => '28212306440775',
                'address' => '11 Cairo University St, Giza, Cairo',
                'department_id' => 2,
                'timetable_id' => 2,
                'employment_date' => '2020-09-17',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Mustafa',
                'last_name' => 'Ahmed',
                'national_id' => '29108211285235',
                'address' => '14 Talaat Harb St, Downtown, Cairo',
                'department_id' => 7,
                'timetable_id' => 1,
                'employment_date' => '2023-02-22',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Aisha',
                'last_name' => 'Farouk',
                'national_id' => '28001240556921',
                'address' => 'Bldg 4, Mirage City, New Cairo',
                'department_id' => 5,
                'timetable_id' => 3,
                'employment_date' => '2021-01-21',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Ziad',
                'last_name' => 'Ashraf',
                'national_id' => '28905258796584',
                'address' => '3 Sphinx St, Mohandessin, Giza, Cairo',
                'department_id' => 3,
                'timetable_id' => 1,
                'employment_date' => '2024-10-31',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Laila',
                'last_name' => 'Mansour',
                'national_id' => '29208216748597',
                'address' => '6 Ramses St, Ramses, Cairo',
                'department_id' => 4,
                'timetable_id' => 1,
                'employment_date' => '2023-03-26',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Mahmoud',
                'last_name' => 'Reda',
                'national_id' => '28901146989508',
                'address' => '19 Orabi St, Shubra, Cairo',
                'department_id' => 1,
                'timetable_id' => 3,
                'employment_date' => '2022-07-30',
                'termination_date' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
