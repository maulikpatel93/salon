<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tax')->delete();
        
        \DB::table('tax')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => NULL,
                'name' => 'GST',
                'description' => NULL,
                'percentage' => '10.00',
                'is_active' => 1,
                'is_active_at' => '2021-02-24 03:21:19',
                'created_at' => '1984-08-04 19:37:55',
                'updated_at' => '2001-02-27 23:12:07',
            ),
            1 => 
            array (
                'id' => 2,
                'salon_id' => NULL,
                'name' => 'QST',
                'description' => NULL,
                'percentage' => '10.00',
                'is_active' => 0,
                'is_active_at' => '2016-09-23 13:44:03',
                'created_at' => '2002-05-15 23:29:03',
                'updated_at' => '2004-06-07 22:29:35',
            ),
            2 => 
            array (
                'id' => 3,
                'salon_id' => NULL,
                'name' => 'PST',
                'description' => NULL,
                'percentage' => '10.00',
                'is_active' => 0,
                'is_active_at' => '2001-10-14 00:05:32',
                'created_at' => '1985-12-06 18:23:15',
                'updated_at' => '2014-01-05 15:49:38',
            ),
            3 => 
            array (
                'id' => 4,
                'salon_id' => NULL,
                'name' => 'HST',
                'description' => NULL,
                'percentage' => '10.00',
                'is_active' => 0,
                'is_active_at' => '1978-12-03 19:39:14',
                'created_at' => '1985-05-10 22:07:34',
                'updated_at' => '1984-06-18 06:42:25',
            ),
        ));
        
        
    }
}