<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'masteradmin',
                'panel' => 'Backend',
                'is_active' => 1,
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'panel' => 'Backend',
                'is_active' => 1,
                'is_active_at' => '2021-11-18 10:39:12',
                'created_at' => '1994-02-01 18:13:21',
                'updated_at' => '2021-11-18 10:39:12',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Subadmin',
                'panel' => 'Backend',
                'is_active' => 1,
                'is_active_at' => '2021-11-24 08:32:19',
                'created_at' => '1971-07-25 10:14:26',
                'updated_at' => '2021-11-24 08:32:19',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Owner',
                'panel' => 'Frontend',
                'is_active' => 1,
                'is_active_at' => '2021-11-24 10:52:56',
                'created_at' => '2021-11-24 10:52:56',
                'updated_at' => '2021-11-25 04:45:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Staff',
                'panel' => 'Frontend',
                'is_active' => 1,
                'is_active_at' => '2021-11-25 04:45:47',
                'created_at' => '2021-11-25 04:45:47',
                'updated_at' => '2021-12-03 16:11:30',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Client',
                'panel' => 'Frontend',
                'is_active' => 1,
                'is_active_at' => '2021-12-03 16:11:38',
                'created_at' => '2021-12-03 16:11:38',
                'updated_at' => '2021-12-03 16:11:38',
            ),
        ));
        
        
    }
}