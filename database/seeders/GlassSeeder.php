<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Glass;

class GlassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Glass::updateOrCreate(['id' => 1],
        [
            'name' => 'Windshield',
            'type' => Glass::TYPE_WINDSHIELD
        ]);

        Glass::updateOrCreate(['id' => 2],
        [
            'name' => 'Passenger Front - Door Glass',
            'type' => Glass::TYPE_DOOR
        ]);

        Glass::updateOrCreate(['id' => 3],
        [
            'name' => 'Driver Front - Door Glass',
            'type' => Glass::TYPE_DOOR
        ]);

        Glass::updateOrCreate(['id' => 4],
        [
            'name' => 'Passenger Back - Door Glass',
            'type' => Glass::TYPE_DOOR
        ]);

        Glass::updateOrCreate(['id' => 5],
        [
            'name' => 'Driver Back - Door Glass',
            'type' => Glass::TYPE_DOOR
        ]);
        
        Glass::updateOrCreate(['id' => 6],
        [
            'name' => 'Passenger Quarter',
            'type' => Glass::TYPE_QUARTER
        ]);

        Glass::updateOrCreate(['id' => 7],
        [
            'name' => 'Driver Quarter',
            'type' => Glass::TYPE_QUARTER
        ]);

        Glass::updateOrCreate(['id' => 8],
        [
            'name' => 'Back Glass',
            'type' => Glass::TYPE_VENT
        ]);
    }
}
