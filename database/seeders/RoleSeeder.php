<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        DB::table('roles')->insert([
            [
                'name' => 'masteradmin',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'name' => 'admin',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'name' => 'Subadmin',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'name' => 'Owner',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'name' => 'Staff',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
            [
                'name' => 'Client',
                'is_active' => '1',
                'is_active_at' => $facker->DateTime(),
                'created_at' => $facker->DateTime(),
                'updated_at' => $facker->DateTime(),
            ],
        ]);
    }
}