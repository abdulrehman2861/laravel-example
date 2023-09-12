<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerType;

class CustomerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerType::insert([
            ['name' => 'Walk'],
            ['name' => 'Phone Call'],
            ['name' => 'Website'],
            ['name' => 'Insurance'],
            ['name' => 'Dealer/Shop Accounts'],
            ['name' => 'Mobile Glass Installer'],
        ]);
    }
}
