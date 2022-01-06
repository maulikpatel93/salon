<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Str;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        DB::table('tax')->insert([
            [
                'salon_id' => 1,
                'name' => 'GST',
                'description' => null,
                'percentage' => null,
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'salon_id' => 1,
                'name' => 'QST',
                'description' => null,
                'percentage' => null,
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'salon_id' => 1,
                'name' => 'PST',
                'description' => null,
                'percentage' => null,
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'salon_id' => 1,
                'name' => 'HST',
                'description' => null,
                'percentage' => null,
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
        ]);
    }
}