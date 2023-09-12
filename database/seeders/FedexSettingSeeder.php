<?php

namespace Database\Seeders;

use App\Models\FedexSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FedexSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FedexSetting::truncate();
        
        FedexSetting::create([
            'account_number' => '510087780',
            'meter_number' => '118755583',
            'key' => 'j5Q9Q7Q9Q5Q5Q5Q5',
            'password' => 'j5Q9Q7Q9Q5Q5Q5Q5',
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
