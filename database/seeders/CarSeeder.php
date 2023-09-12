<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'name' => 'Corolla',
            'car_company_id' => 1,
        ]);
        
        Car::create([
            'name' => 'Civic',
            'car_company_id' => 2,
        ]);

        Car::create([
            'name' => 'Cultus',
            'car_company_id' => 3,
        ]);

        Car::create([
            'name' => 'Mehran',
            'car_company_id' => 3,
        ]);
    }
}
