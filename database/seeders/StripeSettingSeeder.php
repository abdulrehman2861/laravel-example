<?php

namespace Database\Seeders;

use App\Models\StripeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StripeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StripeSetting::truncate();
        
        StripeSetting::create([
            'api_key' => 'pk_te',
            'api_secret' => 'sk_te',
            'is_live' => false,
            'is_active' => false,
        ]);
    }
}
