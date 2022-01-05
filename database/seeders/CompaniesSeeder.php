<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        DB::table('salons')->insert([
            'business_name' => $facker->company(),
            'owner_name' => $facker->name(),
            'business_phone_number' => $facker->phoneNumber(),
            'business_email' => $facker->email(),
            'business_email_verified' => '1',
            'business_phone_number_verified' => '1',
            'business_address' => $facker->address(),
            'salon_type' => 'Unisex',
            'logo' => '',
            'timezone' => $facker->timezone(),
            'is_active' => 1,
            'created_at' => $facker->DateTime(),
            'updated_at' => $facker->DateTime(),
        ]);
    }
}