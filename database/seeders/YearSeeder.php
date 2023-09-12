<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Year;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Year::create([
            'name' => '2020',
        ]);
        
        Year::create([
            'name' => '2021',
        ]);

        Year::create([
            'name' => '2022',
        ]);

        Year::create([
            'name' => '2023',
        ]);
    }
}
