<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductFitting;

class ProductFittingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductFitting::create([
            'product_id' => 1,
            'year_type' => 'Single',
            'feature_id' => 1,
            'glass_id' => 1,
            'body_style_id' => 1,
            'car_id' => 1,
            'year_from_id' => 1,
            'year_to_id' => 2,
            'category_id' => 1,
        ]);

        ProductFitting::create([
            'product_id' => 2,
            'year_type' => 'Single',
            'feature_id' => 2,
            'glass_id' => 1,
            'body_style_id' => 2,
            'car_id' => 2,
            'year_from_id' => 1,
            'year_to_id' => 4,
            'category_id' => 1,
        ]);

        ProductFitting::create([
            'product_id' => 3,
            'year_type' => 'Single',
            'feature_id' => 3,
            'glass_id' => 2,
            'body_style_id' => 3,
            'car_id' => 3,
            'year_from_id' => 1,
            'year_to_id' => 4,
            'category_id' => 1,
        ]);
    }
}
