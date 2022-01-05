<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesAccessTableSeeder::class);
        $this->call([
            CompaniesSeeder::class,
            // RoleSeeder::class,
            // ModuleSeeder::class,
            UserSeeder::class,
        ]);
    }
}