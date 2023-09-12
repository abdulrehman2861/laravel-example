<?php

namespace Database\Seeders;

use App\Models\PaypalSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaypalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaypalSetting::truncate();
        
        PaypalSetting::create([
            'client_id' => 'pk_te',
            'client_secret' => 'sk_te',
            'is_live' => false,
            'is_active' => false,
        ]);
    }
}
