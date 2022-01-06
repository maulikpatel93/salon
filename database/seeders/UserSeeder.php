<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        // $token = Str::random(config('params.auth_key_character'));
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'salon_id' => null,
                'auth_key' => hash('sha256', Str::random(config('params.auth_key_character'))),
                'first_name' => 'master',
                'last_name' => 'admin',
                'username' => 'masteradmin',
                'email' => 'masteradmin@gmail.com',
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
                'updated_at' => $facker->DateTime(),
            ],
            [
                'role_id' => 2,
                'salon_id' => null,
                'auth_key' => hash('sha256', Str::random(config('params.auth_key_character'))),
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
                'updated_at' => $facker->DateTime(),
            ],
            [
                'role_id' => 4,
                'salon_id' => 1,
                'auth_key' => hash('sha256', Str::random(config('params.auth_key_character'))),
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
                'updated_at' => $facker->DateTime(),
            ],
        ]);
    }
}