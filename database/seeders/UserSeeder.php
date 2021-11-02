<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'first_name' => $facker->firstName(),
                'last_name' => $facker->lastName(),
                'username' => $facker->userName(),
                'email' => $facker->email(),
                'email_verified' => '1',
                'email_verified_at' => $facker->DateTime(),
                'password' => Hash::make('123456'),
                'phone_number' => $facker->phoneNumber(),
                'phone_number_verified' => '1',
                'phone_number_verified_at' => $facker->DateTime(),
                'profile_photo' => '',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime()
            ]
        ]);
    }
}
