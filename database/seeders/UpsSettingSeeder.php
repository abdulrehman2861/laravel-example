<?php

namespace Database\Seeders;

use App\Models\UpsSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpsSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UpsSetting::truncate();
        
        UpsSetting::create([
            'account_number' => '5B2E0A',
            'user_id' => 'John',
            'password' => '123456',
            'client_id' => '5B2E0A',
            'client_secret' => '123456',
            'ship_from_addressLine' => 'Auto Glass Depot, 2862 Hartland Rd',
            'ship_from_city' => 'Falls Church',
            'ship_from_state' => 'VA',
            'ship_from_postalCode' => '22043',
            'ship_from_countryCode' => 'US',
            'is_live' => false,
            'is_active' => false,
        ]);
    }
}
