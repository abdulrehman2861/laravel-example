<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'part_name' => 'Windshield',
            'part_number' => '123456',
            'inter_number' => '123456',
            'shelf' => 'A',
            'price' => '100',
            'cost' => '50',
            'quantity' => '10',
            'alert_quantity' => '5',
            'apply_tax' => '1',
            'tax' => '10',
            'tax_type' => 'Exclusive',
            'unit'  => '1',
            'note' => 'This is a note',
            'warehouse_id' => '1',
            'supplier_id' => '1',
        ]);

        Product::create([
            'part_name' => 'Door',
            'part_number' => '123456',
            'inter_number' => '123456',
            'shelf' => 'A',
            'price' => '100',
            'cost' => '50',
            'quantity' => '10',
            'alert_quantity' => '5',
            'apply_tax' => '1',
            'tax' => '10',
            'tax_type' => 'Exclusive',
            'unit'  => '1',
            'note' => 'This is a note',
            'warehouse_id' => '1',
            'supplier_id' => '1',
        ]);

        Product::create([
            'part_name' => 'Headlight',
            'part_number' => '123456',
            'inter_number' => '123456',
            'shelf' => 'A',
            'price' => '100',
            'cost' => '50',
            'quantity' => '10',
            'alert_quantity' => '5',
            'apply_tax' => '1',
            'tax' => '10',
            'tax_type' => 'Exclusive',
            'unit'  => '1',
            'note' => 'This is a note',
            'warehouse_id' => '1',
            'supplier_id' => '1',
        ]);
    }
}
