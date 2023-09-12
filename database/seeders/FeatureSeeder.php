<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'name' => 'breakable',
            'glass_id' => '1'
        ]);

        Feature::create([
            'name' => 'tinted',
            'glass_id' => '1'
        ]);

        Feature::create([
            'name' => 'rain sensor',
            'glass_id' => '1'
        ]);
    }
}
