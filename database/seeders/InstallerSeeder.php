<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Installer;

class InstallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Installer::create([
            'first_name' => 'Installer 1',
            'last_name' => 'test',
            'email' => 'abc@test.cl',
            'social_security_number' => '1234567890',
            'phone' => '1234567890',
            'identity_number' => '1234567890',
            'city' => 'CA',
            'country' => 'US'
        ]);
    }
}
