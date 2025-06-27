<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SpecialOffersSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $offers = [
            // Expired Offers
            [
                'offer_name'      => 'Winter Saver',
                'offer_name_ar'   => 'عرض الشتاء',
                'code'            => 'WINTER10',
                'allocated_slots' => 100,
                'discount_type'   => 'percentage',
                'discount_value'  => 10,
                'image_url'       => null,
                'valid_from'      => $now->copy()->subMonths(4),
                'valid_to'        => $now->copy()->subMonths(3),
                'description'     => '10% off on all menu items during winter.',
                'description_ar'  => 'خصم 10% على كل المنتجات خلال فصل الشتاء.',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'offer_name'      => 'New Year Deal',
                'offer_name_ar'   => 'عرض السنة الجديدة',
                'code'            => 'NEWYEAR20',
                'allocated_slots' => 200,
                'discount_type'   => 'fixed',
                'discount_value'  => 20,
                'image_url'       => null,
                'valid_from'      => $now->copy()->subMonths(6),
                'valid_to'        => $now->copy()->subMonths(5),
                'description'     => 'Flat 20 EGP off for New Year orders.',
                'description_ar'  => 'خصم 20 جنيه على الطلبات بمناسبة السنة الجديدة.',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'offer_name'      => 'Eid Special',
                'offer_name_ar'   => 'عرض العيد',
                'code'            => 'EID15',
                'allocated_slots' => 150,
                'discount_type'   => 'percentage',
                'discount_value'  => 15,
                'image_url'       => null,
                'valid_from'      => $now->copy()->subMonths(2),
                'valid_to'        => $now->copy()->subMonth(),
                'description'     => '15% off during Eid celebration.',
                'description_ar'  => 'خصم 15% بمناسبة العيد.',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],

            // Active Offer
            [
                'offer_name'      => 'Summer Refresh',
                'offer_name_ar'   => 'عرض الصيف',
                'code'            => 'SUMMER25',
                'allocated_slots' => 300,
                'discount_type'   => 'percentage',
                'discount_value'  => 25,
                'image_url'       => null,
                'valid_from'      => $now->copy()->subDays(5),
                'valid_to'        => $now->copy()->addDays(10),
                'description'     => 'Get 25% off all cold drinks this summer.',
                'description_ar'  => 'خصم 25% على المشروبات الباردة هذا الصيف.',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],

            // Upcoming Offer
            [
                'offer_name'      => 'Back to School',
                'offer_name_ar'   => 'عرض العودة للمدارس',
                'code'            => 'SCHOOL30',
                'allocated_slots' => 250,
                'discount_type'   => 'fixed',
                'discount_value'  => 30,
                'image_url'       => null,
                'valid_from'      => $now->copy()->addDays(15),
                'valid_to'        => $now->copy()->addDays(30),
                'description'     => 'Flat 30 EGP off for students.',
                'description_ar'  => 'خصم 30 جنيه للطلاب بمناسبة العودة للمدارس.',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
        ];

        DB::table('special_offers')->insert($offers);
    }
}
