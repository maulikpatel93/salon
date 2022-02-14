<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Str;

class SalonmoduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        DB::table('salon_permissions')->insert([
            [
                'type' => 'Staff',
                'title' => 'Dashboard',
                'position' => 1,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Calender',
                'position' => 2,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Sales',
                'position' => 3,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Vouchers',
                'position' => 4,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Subscriptions',
                'position' => 5,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Clients',
                'position' => 6,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Staff Price Tier',
                'position' => 7,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Staff',
                'position' => 8,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Staff Roster',
                'position' => 9,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Staff Access',
                'position' => 10,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Service Category',
                'position' => 11,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Services',
                'position' => 12,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Supplier',
                'position' => 13,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Products',
                'position' => 14,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Report',
                'position' => 15,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Reports',
                'position' => 16,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Marketing',
                'position' => 17,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
            [
                'type' => 'Staff',
                'title' => 'Account setup',
                'position' => 18,
                'is_active' => '1',
                'is_active_at' => '2021-11-19 05:14:19',
                'created_at' => '1979-08-15 17:59:49',
                'updated_at' => '2021-11-19 05:14:19',
            ],
        ]);
    }
}