<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceTierTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('price_tier')->delete();
        
        \DB::table('price_tier')->insert(array (
            0 => 
            array (
                'id' => 1,
                'salon_id' => 1,
                'name' => 'General',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 05:28:53',
                'created_at' => '2022-03-30 05:28:53',
                'updated_at' => '2022-03-30 05:28:53',
                'is_default' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'salon_id' => 1,
                'name' => 'Junior',
                'description' => '',
                'is_active' => 1,
                'is_active_at' => '2022-03-30 05:28:58',
                'created_at' => '2022-03-30 05:28:58',
                'updated_at' => '2022-03-30 05:28:58',
                'is_default' => 0,
            ),
        ));
        
        
    }
}