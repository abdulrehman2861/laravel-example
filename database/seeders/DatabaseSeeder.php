<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ZipCodeSeeder::class,
            YearSeeder::class,
            GlassSeeder::class,
            CarCompanySeeder::class,
            CarSeeder::class,
            CategorySeeder::class,
            BodyStyleSeeder::class,
            FeatureSeeder::class,
            CustomerTypesSeeder::class,
            InstallerSeeder::class,
            WarehouseSeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            ProductFittingSeeder::class,
            PickupLocationSeeder::class,
            PermissionSeeder::class,
            UpsSettingSeeder::class,
            FedexSettingSeeder::class,
            StripeSettingSeeder::class,
            PaypalSettingSeeder::class,
        ]);
    }
}
