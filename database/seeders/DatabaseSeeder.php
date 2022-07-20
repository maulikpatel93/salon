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
            UserSeeder::class,
            TaxSeeder::class,
        ]);
        $this->call(SalonModulesTableSeeder::class);
        $this->call(SalonPermissionsTableSeeder::class);
        $this->call(SalonAccessTableSeeder::class);
        $this->call(NofifyDetailTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TaxTableSeeder::class);
        $this->call(FormElementTypeTableSeeder::class);
        $this->call(PriceTierTableSeeder::class);
        $this->call(CloseddateTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ServicesPriceTableSeeder::class);
        $this->call(StaffServicesTableSeeder::class);
        $this->call(StaffWorkingHoursTableSeeder::class);
    }
}