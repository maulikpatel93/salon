<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        DB::table('companies')->insert([
            'business_name' => $facker->company(),
            'business_phone' => $facker->phoneNumber(),
            'business_email' => $facker->email(),
            'business_address' => $facker->address(),
            'type' => '',
            'number_of_staff' => 0,
            'timezone' => $facker->timezone(),
            'logo' => '',
            'is_active' => 1,
            'created_at' => $facker->DateTime(),
            'updated_at' => $facker->DateTime()
        ]);
    }
}
