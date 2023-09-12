<?php

namespace Database\Seeders;

use App\Models\PickupLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PickupLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pickupLocations = [
            [
                'name' => 'Outlet 1',
                'address' => '1234 street',
                'city' => 'NYC',
                'state' => 'NY',
                'country' => 'US',
                'zip_code' => '325235',
                'phone_number' => '1234567890',
                'email' => 'abc@asf.com',
            ],
            [
                'name' => 'Outlet 2',
                'address' => '1234 street',
                'city' => 'NYC',
                'state' => 'NY',
                'country' => 'US',
                'zip_code' => '325235',
                'phone_number' => '1234567890',
                'email' => 'aafg@dafg.com',
            ],
            [
                'name' => 'Outlet 3',
                'address' => '1234 street',
                'city' => 'NYC',
                'state' => 'NY',
                'country' => 'US',
                'zip_code' => '325235',
                'phone_number' => '1234567890',
                'email' => 'rasd@fsaf.sae',
            ]
        ];

        PickupLocation::insert($pickupLocations);
    }
}
