<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff_services')->delete();
        
        \DB::table('staff_services')->insert(array (
            0 => 
            array (
                'id' => 4,
                'staff_id' => 7,
                'service_id' => 6,
                'created_at' => '2022-03-30 12:06:28',
                'updated_at' => '2022-03-30 12:06:28',
            ),
            1 => 
            array (
                'id' => 6,
                'staff_id' => 7,
                'service_id' => 16,
                'created_at' => '2022-03-30 13:35:14',
                'updated_at' => '2022-03-30 13:35:14',
            ),
            2 => 
            array (
                'id' => 7,
                'staff_id' => 7,
                'service_id' => 8,
                'created_at' => '2022-03-31 05:57:04',
                'updated_at' => '2022-03-31 05:57:04',
            ),
            3 => 
            array (
                'id' => 8,
                'staff_id' => 9,
                'service_id' => 8,
                'created_at' => '2022-03-31 05:57:04',
                'updated_at' => '2022-03-31 05:57:04',
            ),
            4 => 
            array (
                'id' => 10,
                'staff_id' => 7,
                'service_id' => 15,
                'created_at' => '2022-03-31 06:53:10',
                'updated_at' => '2022-03-31 06:53:10',
            ),
            5 => 
            array (
                'id' => 16,
                'staff_id' => 7,
                'service_id' => 10,
                'created_at' => '2022-04-19 06:23:02',
                'updated_at' => '2022-04-19 06:23:02',
            ),
            6 => 
            array (
                'id' => 17,
                'staff_id' => 7,
                'service_id' => 13,
                'created_at' => '2022-04-19 06:23:02',
                'updated_at' => '2022-04-19 06:23:02',
            ),
            7 => 
            array (
                'id' => 27,
                'staff_id' => 9,
                'service_id' => 6,
                'created_at' => '2022-04-19 07:11:33',
                'updated_at' => '2022-04-19 07:11:33',
            ),
            8 => 
            array (
                'id' => 29,
                'staff_id' => 9,
                'service_id' => 9,
                'created_at' => '2022-04-19 07:11:33',
                'updated_at' => '2022-04-19 07:11:33',
            ),
            9 => 
            array (
                'id' => 30,
                'staff_id' => 9,
                'service_id' => 13,
                'created_at' => '2022-04-19 07:11:33',
                'updated_at' => '2022-04-19 07:11:33',
            ),
            10 => 
            array (
                'id' => 31,
                'staff_id' => 9,
                'service_id' => 15,
                'created_at' => '2022-04-19 07:11:33',
                'updated_at' => '2022-04-19 07:11:33',
            ),
            11 => 
            array (
                'id' => 32,
                'staff_id' => 9,
                'service_id' => 16,
                'created_at' => '2022-04-19 07:11:40',
                'updated_at' => '2022-04-19 07:11:40',
            ),
            12 => 
            array (
                'id' => 33,
                'staff_id' => 9,
                'service_id' => 11,
                'created_at' => '2022-04-19 08:59:55',
                'updated_at' => '2022-04-19 08:59:55',
            ),
            13 => 
            array (
                'id' => 34,
                'staff_id' => 7,
                'service_id' => 14,
                'created_at' => '2022-04-19 09:28:26',
                'updated_at' => '2022-04-19 09:28:26',
            ),
            14 => 
            array (
                'id' => 35,
                'staff_id' => 12,
                'service_id' => 6,
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            15 => 
            array (
                'id' => 36,
                'staff_id' => 12,
                'service_id' => 10,
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            16 => 
            array (
                'id' => 37,
                'staff_id' => 12,
                'service_id' => 11,
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            17 => 
            array (
                'id' => 38,
                'staff_id' => 12,
                'service_id' => 13,
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
        ));
        
        
    }
}