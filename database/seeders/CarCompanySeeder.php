<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarCompany;

class CarCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarCompany::create([
            'name' => 'Toyota',
        ]);
        
        CarCompany::create([
            'name' => 'Honda',
        ]);

        CarCompany::create([
            'name' => 'Suzuki',
        ]);

        CarCompany::create([
            'name' => 'Nissan',
        ]);

        CarCompany::create([
            'name' => 'Mitsubishi',
        ]);
    }
}
