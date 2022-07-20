<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 6,
                'salon_id' => 1,
                'category_id' => 1,
                'tax_id' => 1,
                'name' => 'Haircuts & Styling: Men, Women and Children',
                'description' => '32',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 12:06:28',
                'created_at' => '2022-03-30 12:06:28',
                'updated_at' => '2022-03-31 05:44:56',
            ),
            1 => 
            array (
                'id' => 7,
                'salon_id' => 1,
                'category_id' => 1,
                'tax_id' => 1,
                'name' => 'Perm & Straightening',
                'description' => '1',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:19:50',
                'created_at' => '2022-03-30 13:19:50',
                'updated_at' => '2022-03-31 05:45:28',
            ),
            2 => 
            array (
                'id' => 8,
                'salon_id' => 1,
                'category_id' => 1,
                'tax_id' => 1,
                'name' => 'Conditioning',
                'description' => '3211',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 1,
                'deposit_booked_price' => '100.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:20:57',
                'created_at' => '2022-03-30 13:20:57',
                'updated_at' => '2022-03-31 05:57:04',
            ),
            3 => 
            array (
                'id' => 9,
                'salon_id' => 1,
                'category_id' => 2,
                'tax_id' => 1,
                'name' => 'Basic Facials',
                'description' => '1',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:24:38',
                'created_at' => '2022-03-30 13:24:38',
                'updated_at' => '2022-03-31 06:04:00',
            ),
            4 => 
            array (
                'id' => 10,
                'salon_id' => 1,
                'category_id' => 2,
                'tax_id' => 1,
                'name' => 'Moisturizing Facials',
                'description' => '1',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:32:39',
                'created_at' => '2022-03-30 13:32:39',
                'updated_at' => '2022-03-31 06:04:57',
            ),
            5 => 
            array (
                'id' => 11,
                'salon_id' => 1,
                'category_id' => 3,
                'tax_id' => 1,
                'name' => 'Milk Peel',
                'description' => '32',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:33:05',
                'created_at' => '2022-03-30 13:33:05',
                'updated_at' => '2022-03-31 06:05:19',
            ),
            6 => 
            array (
                'id' => 12,
                'salon_id' => 1,
                'category_id' => 3,
                'tax_id' => 1,
                'name' => 'Micro-Dermabrasion',
                'description' => '323',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:33:47',
                'created_at' => '2022-03-30 13:33:47',
                'updated_at' => '2022-03-31 06:14:29',
            ),
            7 => 
            array (
                'id' => 13,
                'salon_id' => 1,
                'category_id' => 4,
                'tax_id' => 1,
                'name' => 'Botinol',
                'description' => '11',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:34:07',
                'created_at' => '2022-03-30 13:34:07',
                'updated_at' => '2022-03-31 06:52:13',
            ),
            8 => 
            array (
                'id' => 14,
                'salon_id' => 1,
                'category_id' => 5,
                'tax_id' => 1,
                'name' => 'Eye and Lip Contour Treatment',
                'description' => '311',
                'duration' => '30',
                'padding_time' => '50',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:34:23',
                'created_at' => '2022-03-30 13:34:23',
                'updated_at' => '2022-04-19 09:28:26',
            ),
            9 => 
            array (
                'id' => 15,
                'salon_id' => 1,
                'category_id' => 6,
                'tax_id' => 1,
                'name' => 'Chair Massage',
                'description' => '32',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:34:49',
                'created_at' => '2022-03-30 13:34:49',
                'updated_at' => '2022-03-31 06:53:10',
            ),
            10 => 
            array (
                'id' => 16,
                'salon_id' => 1,
                'category_id' => 6,
                'tax_id' => 1,
                'name' => 'Foot Massage',
                'description' => '2',
                'duration' => '30',
                'padding_time' => '30',
                'color' => '',
                'service_booked_online' => 0,
                'deposit_booked_online' => 0,
                'deposit_booked_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 13:35:14',
                'created_at' => '2022-03-30 13:35:14',
                'updated_at' => '2022-03-31 06:56:21',
            ),
        ));
        
        
    }
}