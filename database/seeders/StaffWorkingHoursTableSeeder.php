<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffWorkingHoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff_working_hours')->delete();
        
        \DB::table('staff_working_hours')->insert(array (
            0 => 
            array (
                'id' => 22,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Sunday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            1 => 
            array (
                'id' => 23,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Monday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            2 => 
            array (
                'id' => 24,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Tuesday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            3 => 
            array (
                'id' => 25,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Wednesday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            4 => 
            array (
                'id' => 26,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Thursday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            5 => 
            array (
                'id' => 27,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Friday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            6 => 
            array (
                'id' => 28,
                'salon_id' => 1,
                'staff_id' => 7,
                'days' => 'Saturday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 06:28:14',
                'created_at' => '2022-03-30 06:28:14',
                'updated_at' => '2022-03-30 06:28:14',
            ),
            7 => 
            array (
                'id' => 36,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Sunday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-30 07:32:30',
            ),
            8 => 
            array (
                'id' => 37,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Monday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-31 06:58:28',
            ),
            9 => 
            array (
                'id' => 38,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Tuesday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-31 06:58:28',
            ),
            10 => 
            array (
                'id' => 39,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Wednesday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-31 06:58:29',
            ),
            11 => 
            array (
                'id' => 40,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Thursday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-31 06:58:29',
            ),
            12 => 
            array (
                'id' => 41,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Friday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-31 06:58:29',
            ),
            13 => 
            array (
                'id' => 42,
                'salon_id' => 1,
                'staff_id' => 9,
                'days' => 'Saturday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-03-30 07:32:30',
                'created_at' => '2022-03-30 07:32:30',
                'updated_at' => '2022-03-30 07:32:30',
            ),
            14 => 
            array (
                'id' => 43,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Sunday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            15 => 
            array (
                'id' => 44,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Monday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            16 => 
            array (
                'id' => 45,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '19:00:00',
                'break_time' => '[]',
                'dayoff' => 1,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            17 => 
            array (
                'id' => 46,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Wednesday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            18 => 
            array (
                'id' => 47,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Thursday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            19 => 
            array (
                'id' => 48,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Friday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
            20 => 
            array (
                'id' => 49,
                'salon_id' => 1,
                'staff_id' => 12,
                'days' => 'Saturday',
                'start_time' => NULL,
                'end_time' => NULL,
                'break_time' => '[]',
                'dayoff' => 0,
                'is_active' => 1,
                'is_active_at' => '2022-04-26 10:15:32',
                'created_at' => '2022-04-26 10:15:32',
                'updated_at' => '2022-04-26 10:15:32',
            ),
        ));
        
        
    }
}