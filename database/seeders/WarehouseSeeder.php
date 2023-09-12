<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'name' => 'Warehouse 1',
            'address' => 'A2312, Street 1, City 1',
            'location_code' => 'City-1',
        ]);

        Warehouse::create([
            'name' => 'Warehouse 2',
            'address' => 'A2312, Street 2, City 2',
            'location_code' => 'City-2',
        ]);
    }
}
