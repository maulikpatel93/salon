<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CloseddateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('closeddate')->delete();
        
        \DB::table('closeddate')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:35:30',
                'created_at' => '2022-05-03 10:35:30',
                'updated_at' => '2022-05-03 10:35:30',
            ),
            1 => 
            array (
                'id' => 2,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:45:17',
                'created_at' => '2022-05-03 10:45:17',
                'updated_at' => '2022-05-03 10:45:17',
            ),
            2 => 
            array (
                'id' => 3,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:46:48',
                'created_at' => '2022-05-03 10:46:48',
                'updated_at' => '2022-05-03 10:46:48',
            ),
            3 => 
            array (
                'id' => 4,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:46:50',
                'created_at' => '2022-05-03 10:46:50',
                'updated_at' => '2022-05-03 10:46:50',
            ),
            4 => 
            array (
                'id' => 5,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:46:57',
                'created_at' => '2022-05-03 10:46:57',
                'updated_at' => '2022-05-03 10:46:57',
            ),
            5 => 
            array (
                'id' => 6,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:47:15',
                'created_at' => '2022-05-03 10:47:15',
                'updated_at' => '2022-05-03 10:47:15',
            ),
            6 => 
            array (
                'id' => 7,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 10:49:00',
                'created_at' => '2022-05-03 10:49:00',
                'updated_at' => '2022-05-03 10:49:00',
            ),
            7 => 
            array (
                'id' => 8,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => '11111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 12:28:06',
                'created_at' => '2022-05-03 12:28:06',
                'updated_at' => '2022-05-03 12:28:06',
            ),
            8 => 
            array (
                'id' => 9,
                'salon_id' => 1,
                'start_date' => '2022-05-02',
                'end_date' => '2022-05-16',
                'reason' => 'test1111',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 12:28:13',
                'created_at' => '2022-05-03 12:28:13',
                'updated_at' => '2022-05-03 12:28:40',
            ),
            9 => 
            array (
                'id' => 10,
                'salon_id' => 1,
                'start_date' => '2022-05-11',
                'end_date' => '2022-05-18',
                'reason' => '11',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 12:29:05',
                'created_at' => '2022-05-03 12:29:05',
                'updated_at' => '2022-05-03 12:29:05',
            ),
            10 => 
            array (
                'id' => 11,
                'salon_id' => 1,
                'start_date' => '2022-05-11',
                'end_date' => '2022-05-25',
                'reason' => '1',
                'is_active' => 1,
                'is_active_at' => '2022-05-03 12:29:15',
                'created_at' => '2022-05-03 12:29:15',
                'updated_at' => '2022-05-03 12:29:15',
            ),
        ));
        
        
    }
}