<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => 1,
                'name' => 'Hair Care',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:56:23',
                'created_at' => '2022-03-30 08:56:23',
                'updated_at' => '2022-03-30 09:04:08',
            ),
            1 => 
            array (
                'id' => 2,
                'salon_id' => 1,
                'name' => 'Facial Treatments',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:56:32',
                'created_at' => '2022-03-30 08:56:32',
                'updated_at' => '2022-03-30 09:04:19',
            ),
            2 => 
            array (
                'id' => 3,
                'salon_id' => 1,
                'name' => 'Advanced Facial Treatments',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:56:41',
                'created_at' => '2022-03-30 08:56:41',
                'updated_at' => '2022-03-30 09:05:17',
            ),
            3 => 
            array (
                'id' => 4,
                'salon_id' => 1,
                'name' => 'Anti-Aging Treatments',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:56:52',
                'created_at' => '2022-03-30 08:56:52',
                'updated_at' => '2022-03-30 09:05:41',
            ),
            4 => 
            array (
                'id' => 5,
                'salon_id' => 1,
                'name' => 'Eye Treatment Center',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:58:17',
                'created_at' => '2022-03-30 08:58:17',
                'updated_at' => '2022-03-30 09:05:52',
            ),
            5 => 
            array (
                'id' => 6,
                'salon_id' => 1,
                'name' => 'Body Massage',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:59:11',
                'created_at' => '2022-03-30 08:59:11',
                'updated_at' => '2022-03-30 09:06:01',
            ),
            6 => 
            array (
                'id' => 7,
                'salon_id' => 1,
                'name' => 'Makeup Services',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 08:59:37',
                'created_at' => '2022-03-30 08:59:37',
                'updated_at' => '2022-03-30 09:06:23',
            ),
            7 => 
            array (
                'id' => 8,
                'salon_id' => 1,
                'name' => 'Waxing',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 09:06:32',
                'created_at' => '2022-03-30 09:06:32',
                'updated_at' => '2022-03-30 09:06:44',
            ),
            8 => 
            array (
                'id' => 9,
                'salon_id' => 1,
                'name' => 'Nail Care',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 09:06:53',
                'created_at' => '2022-03-30 09:06:53',
                'updated_at' => '2022-03-30 09:06:53',
            ),
            9 => 
            array (
                'id' => 10,
                'salon_id' => 1,
                'name' => 'Body Shaping & Fitness',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 09:07:03',
                'created_at' => '2022-03-30 09:07:03',
                'updated_at' => '2022-03-30 09:07:03',
            ),
        ));
        
        
    }
}