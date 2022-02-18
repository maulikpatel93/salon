<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalonAccessTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('salon_access')->delete();
        
        \DB::table('salon_access')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 8,
                'access' => '0',
            ),
            1 => 
            array (
                'id' => 3,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 1,
                'access' => '1',
            ),
            2 => 
            array (
                'id' => 4,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 2,
                'access' => '1',
            ),
            3 => 
            array (
                'id' => 5,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 3,
                'access' => '1',
            ),
            4 => 
            array (
                'id' => 6,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 4,
                'access' => '1',
            ),
            5 => 
            array (
                'id' => 7,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 5,
                'access' => '1',
            ),
            6 => 
            array (
                'id' => 8,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 6,
                'access' => '1',
            ),
            7 => 
            array (
                'id' => 9,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 7,
                'access' => '1',
            ),
            8 => 
            array (
                'id' => 10,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 12,
                'access' => '1',
            ),
            9 => 
            array (
                'id' => 11,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 13,
                'access' => '1',
            ),
            10 => 
            array (
                'id' => 12,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 14,
                'access' => '1',
            ),
            11 => 
            array (
                'id' => 13,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 15,
                'access' => '1',
            ),
            12 => 
            array (
                'id' => 14,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 16,
                'access' => '1',
            ),
            13 => 
            array (
                'id' => 15,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 9,
                'access' => '0',
            ),
            14 => 
            array (
                'id' => 16,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 10,
                'access' => '0',
            ),
            15 => 
            array (
                'id' => 17,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 11,
                'access' => '1',
            ),
            16 => 
            array (
                'id' => 18,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 32,
                'access' => '1',
            ),
            17 => 
            array (
                'id' => 19,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 33,
                'access' => '0',
            ),
            18 => 
            array (
                'id' => 20,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 34,
                'access' => '1',
            ),
            19 => 
            array (
                'id' => 21,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 35,
                'access' => '0',
            ),
            20 => 
            array (
                'id' => 22,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 36,
                'access' => '0',
            ),
            21 => 
            array (
                'id' => 23,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 22,
                'access' => '1',
            ),
            22 => 
            array (
                'id' => 24,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 23,
                'access' => '1',
            ),
            23 => 
            array (
                'id' => 25,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 24,
                'access' => '0',
            ),
            24 => 
            array (
                'id' => 26,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 25,
                'access' => '1',
            ),
            25 => 
            array (
                'id' => 27,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 26,
                'access' => '0',
            ),
            26 => 
            array (
                'id' => 28,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 27,
                'access' => '1',
            ),
            27 => 
            array (
                'id' => 29,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 28,
                'access' => '0',
            ),
            28 => 
            array (
                'id' => 30,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 29,
                'access' => '1',
            ),
            29 => 
            array (
                'id' => 31,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 30,
                'access' => '0',
            ),
            30 => 
            array (
                'id' => 32,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 31,
                'access' => '0',
            ),
            31 => 
            array (
                'id' => 33,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 37,
                'access' => '1',
            ),
            32 => 
            array (
                'id' => 34,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 38,
                'access' => '0',
            ),
            33 => 
            array (
                'id' => 35,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 39,
                'access' => '1',
            ),
            34 => 
            array (
                'id' => 36,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 40,
                'access' => '0',
            ),
            35 => 
            array (
                'id' => 37,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 41,
                'access' => '0',
            ),
            36 => 
            array (
                'id' => 38,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 17,
                'access' => '1',
            ),
            37 => 
            array (
                'id' => 39,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 18,
                'access' => '1',
            ),
            38 => 
            array (
                'id' => 40,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 19,
                'access' => '1',
            ),
            39 => 
            array (
                'id' => 41,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 20,
                'access' => '1',
            ),
            40 => 
            array (
                'id' => 42,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 21,
                'access' => '1',
            ),
            41 => 
            array (
                'id' => 43,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 42,
                'access' => '1',
            ),
            42 => 
            array (
                'id' => 44,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 43,
                'access' => '0',
            ),
            43 => 
            array (
                'id' => 45,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 44,
                'access' => '1',
            ),
            44 => 
            array (
                'id' => 46,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 50,
                'access' => '1',
            ),
            45 => 
            array (
                'id' => 47,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 51,
                'access' => '1',
            ),
            46 => 
            array (
                'id' => 48,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 52,
                'access' => '1',
            ),
            47 => 
            array (
                'id' => 49,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 53,
                'access' => '1',
            ),
            48 => 
            array (
                'id' => 50,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 45,
                'access' => '0',
            ),
            49 => 
            array (
                'id' => 51,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 46,
                'access' => '1',
            ),
            50 => 
            array (
                'id' => 52,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 47,
                'access' => '0',
            ),
            51 => 
            array (
                'id' => 53,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 48,
                'access' => '1',
            ),
            52 => 
            array (
                'id' => 54,
                'salon_id' => 1,
                'role_id' => 5,
                'salon_permission_id' => 49,
                'access' => '0',
            ),
        ));
        
        
    }
}