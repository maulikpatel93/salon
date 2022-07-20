<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesPriceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services_price')->delete();
        
        \DB::table('services_price')->insert(array (
            0 => 
            array (
                'id' => 7,
                'service_id' => 6,
                'price_tier_id' => 1,
                'price' => '12.00',
                'add_on_price' => '1.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:44:56',
                'created_at' => '2022-03-30 12:06:28',
                'updated_at' => '2022-03-31 05:44:56',
            ),
            1 => 
            array (
                'id' => 8,
                'service_id' => 6,
                'price_tier_id' => 2,
                'price' => '100.00',
                'add_on_price' => '12.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:44:56',
                'created_at' => '2022-03-30 12:06:28',
                'updated_at' => '2022-03-31 05:44:56',
            ),
            2 => 
            array (
                'id' => 9,
                'service_id' => 10,
                'price_tier_id' => 1,
                'price' => '200.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:04:57',
                'created_at' => '2022-03-30 13:32:39',
                'updated_at' => '2022-03-31 06:04:57',
            ),
            3 => 
            array (
                'id' => 10,
                'service_id' => 10,
                'price_tier_id' => 2,
                'price' => '100.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:04:57',
                'created_at' => '2022-03-30 13:32:39',
                'updated_at' => '2022-03-31 06:04:57',
            ),
            4 => 
            array (
                'id' => 11,
                'service_id' => 11,
                'price_tier_id' => 1,
                'price' => '200.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:05:19',
                'created_at' => '2022-03-30 13:33:05',
                'updated_at' => '2022-03-31 06:05:19',
            ),
            5 => 
            array (
                'id' => 12,
                'service_id' => 11,
                'price_tier_id' => 2,
                'price' => '100.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:05:19',
                'created_at' => '2022-03-30 13:33:05',
                'updated_at' => '2022-03-31 06:05:19',
            ),
            6 => 
            array (
                'id' => 13,
                'service_id' => 12,
                'price_tier_id' => 1,
                'price' => '220.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:14:29',
                'created_at' => '2022-03-30 13:33:47',
                'updated_at' => '2022-03-31 06:14:29',
            ),
            7 => 
            array (
                'id' => 14,
                'service_id' => 12,
                'price_tier_id' => 2,
                'price' => '120.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:14:29',
                'created_at' => '2022-03-30 13:33:47',
                'updated_at' => '2022-03-31 06:14:29',
            ),
            8 => 
            array (
                'id' => 15,
                'service_id' => 13,
                'price_tier_id' => 1,
                'price' => '454.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:52:13',
                'created_at' => '2022-03-30 13:34:07',
                'updated_at' => '2022-03-31 06:52:13',
            ),
            9 => 
            array (
                'id' => 16,
                'service_id' => 13,
                'price_tier_id' => 2,
                'price' => '454.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:52:13',
                'created_at' => '2022-03-30 13:34:07',
                'updated_at' => '2022-03-31 06:52:13',
            ),
            10 => 
            array (
                'id' => 17,
                'service_id' => 14,
                'price_tier_id' => 1,
                'price' => '3.00',
                'add_on_price' => '3.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 09:28:26',
                'created_at' => '2022-03-30 13:34:23',
                'updated_at' => '2022-04-19 09:28:26',
            ),
            11 => 
            array (
                'id' => 18,
                'service_id' => 14,
                'price_tier_id' => 2,
                'price' => '3.00',
                'add_on_price' => '3.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 09:28:26',
                'created_at' => '2022-03-30 13:34:23',
                'updated_at' => '2022-04-19 09:28:26',
            ),
            12 => 
            array (
                'id' => 19,
                'service_id' => 15,
                'price_tier_id' => 1,
                'price' => '11.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 09:28:13',
                'created_at' => '2022-03-30 13:34:49',
                'updated_at' => '2022-04-19 09:28:13',
            ),
            13 => 
            array (
                'id' => 20,
                'service_id' => 15,
                'price_tier_id' => 2,
                'price' => '22.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 09:28:13',
                'created_at' => '2022-03-30 13:34:49',
                'updated_at' => '2022-04-19 09:28:13',
            ),
            14 => 
            array (
                'id' => 21,
                'service_id' => 16,
                'price_tier_id' => 1,
                'price' => '22.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 10:37:00',
                'created_at' => '2022-03-30 13:35:14',
                'updated_at' => '2022-04-19 10:37:00',
            ),
            15 => 
            array (
                'id' => 22,
                'service_id' => 16,
                'price_tier_id' => 2,
                'price' => '10.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-04-19 10:37:00',
                'created_at' => '2022-03-30 13:35:14',
                'updated_at' => '2022-04-19 10:37:00',
            ),
            16 => 
            array (
                'id' => 23,
                'service_id' => 7,
                'price_tier_id' => 1,
                'price' => '12.00',
                'add_on_price' => '1.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:45:28',
                'created_at' => '2022-03-31 05:45:28',
                'updated_at' => '2022-03-31 05:45:28',
            ),
            17 => 
            array (
                'id' => 24,
                'service_id' => 7,
                'price_tier_id' => 2,
                'price' => '100.00',
                'add_on_price' => '12.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:45:28',
                'created_at' => '2022-03-31 05:45:28',
                'updated_at' => '2022-03-31 05:45:28',
            ),
            18 => 
            array (
                'id' => 25,
                'service_id' => 8,
                'price_tier_id' => 1,
                'price' => '12.00',
                'add_on_price' => '22.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:57:04',
                'created_at' => '2022-03-31 05:45:52',
                'updated_at' => '2022-03-31 05:57:04',
            ),
            19 => 
            array (
                'id' => 26,
                'service_id' => 8,
                'price_tier_id' => 2,
                'price' => '10.00',
                'add_on_price' => '12.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 05:57:04',
                'created_at' => '2022-03-31 05:45:52',
                'updated_at' => '2022-03-31 05:57:04',
            ),
            20 => 
            array (
                'id' => 27,
                'service_id' => 9,
                'price_tier_id' => 1,
                'price' => '200.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:04:00',
                'created_at' => '2022-03-31 06:03:37',
                'updated_at' => '2022-03-31 06:04:00',
            ),
            21 => 
            array (
                'id' => 28,
                'service_id' => 9,
                'price_tier_id' => 2,
                'price' => '100.00',
                'add_on_price' => '0.00',
                'is_active' => 1,
                'is_active_at' => '2022-03-31 06:04:00',
                'created_at' => '2022-03-31 06:03:37',
                'updated_at' => '2022-03-31 06:04:00',
            ),
        ));
        
        
    }
}