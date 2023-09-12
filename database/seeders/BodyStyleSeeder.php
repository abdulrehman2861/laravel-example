<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BodyStyle;
use Illuminate\Support\Facades\DB;

class BodyStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BodyStyle::create([
            'name' => 'Sedan',
        ]);

        BodyStyle::create([
            'name' => 'Hatchback',
        ]);

        BodyStyle::create([
            'name' => 'SUV',
        ]);

        BodyStyle::create([
            'name' => 'MPV',
        ]);

        BodyStyle::create([
            'name' => 'Pickup',
        ]);

        DB::insert('INSERT INTO body_styles_glasses (body_style_id, glass_id) VALUES (?, ?)', ['1', '1']);

        DB::insert('INSERT INTO body_styles_glasses (body_style_id, glass_id) VALUES (?, ?)', ['2', '2']);

        DB::insert('INSERT INTO body_styles_glasses (body_style_id, glass_id) VALUES (?, ?)', ['3', '3']);

        DB::insert('INSERT INTO body_styles_glasses (body_style_id, glass_id) VALUES (?, ?)', ['3', '1']);
        
        DB::insert('INSERT INTO cars_body_styles (car_id, body_style_id) VALUES (?, ?)', ['1', '1']);

        DB::insert('INSERT INTO cars_body_styles (car_id, body_style_id) VALUES (?, ?)', ['2', '1']);

        DB::insert('INSERT INTO cars_body_styles (car_id, body_style_id) VALUES (?, ?)', ['3', '2']);

        DB::insert('INSERT INTO cars_body_styles (car_id, body_style_id) VALUES (?, ?)', ['4', '3']);
    }
}
