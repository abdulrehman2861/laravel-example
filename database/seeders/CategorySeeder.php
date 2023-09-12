<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'  => 'Glass',
            'code' => 'GLASS'
        ]);

        Category::create([
            'name'  => 'Accessories',
            'code' => 'ACCESSORIES'
        ]);

        Category::create([
            'name'  => 'Tools',
            'code' => 'TOOLS'
        ]);

        Category::create([
            'name'  => 'Doors',
            'parent_id' => 1,
            'code' => 'DOORS'
        ]);
    }
}
