<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NofifyDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nofify_detail')->delete();
        
        \DB::table('nofify_detail')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'email-send.png',
                'title' => 'New Appointment',
                'nofify' => 'Email',
                'type' => 'NewAppointment',
                'short_description' => 'Automatically sends to a client on booking an appointment',
                'appointment_times_description' => 'Test',
                'cancellation_description' => 'Test',
                'sms_template' => NULL,
                'preview' => 'null',
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-14 05:29:42',
            ),
            1 => 
            array (
                'id' => 2,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'email-send.png',
                'title' => 'Appointment Reminder',
                'nofify' => 'Email',
                'type' => 'AppointmentReminder',
                'short_description' => 'Automatically sends to a client 24 hours before their appointment',
                'appointment_times_description' => 'goof',
                'cancellation_description' => 'dsa',
                'sms_template' => NULL,
                'preview' => NULL,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-13 12:15:31',
            ),
            2 => 
            array (
                'id' => 3,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'email-send.png',
                'title' => 'Cancelled Appointment',
                'nofify' => 'Email',
                'type' => 'CancelledAppointment',
                'short_description' => 'Automatically sends to a client if their appointment is cancelled',
                'appointment_times_description' => 'null',
                'cancellation_description' => 'null',
                'sms_template' => NULL,
                'preview' => 'null',
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-14 05:32:51',
            ),
            3 => 
            array (
                'id' => 4,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'email-send.png',
                'title' => 'No-Show',
                'nofify' => 'Email',
                'type' => 'NoShow',
                'short_description' => 'Automatically sends to a client if their appointment is marked as no-show',
                'appointment_times_description' => 'null',
                'cancellation_description' => 'null',
                'sms_template' => NULL,
                'preview' => 'null',
                'is_active' => 0,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-14 05:32:31',
            ),
            4 => 
            array (
                'id' => 5,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'msg-gray.png',
                'title' => 'Appointment Reminder',
                'nofify' => 'SMS',
                'type' => 'AppointmentReminder',
                'short_description' => 'Automatically sends to a client 24 hours before their appointment',
                'appointment_times_description' => 'null',
                'cancellation_description' => 'null',
                'sms_template' => 'test BUSINESS_NAME templay block',
                'preview' => 'null',
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-18 12:49:47',
            ),
            5 => 
            array (
                'id' => 6,
                'salon_id' => 1,
                'form_id' => NULL,
                'icon' => 'msg-gray.png',
                'title' => 'Reply \'Yes\' to Confirm',
                'nofify' => 'SMS',
                'type' => 'ReplyYesToConfirm',
                'short_description' => 'Automatically sends to a client 48 hours before their appointment if not confirmed',
                'appointment_times_description' => NULL,
                'cancellation_description' => NULL,
                'sms_template' => NULL,
                'preview' => NULL,
                'is_active' => 1,
                'is_active_at' => NULL,
                'created_at' => '2022-07-13 11:10:14',
                'updated_at' => '2022-07-13 11:10:49',
            ),
        ));
        
        
    }
}