<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'Supplier 1',
            'contact_person' => 'Known Person',
            'address' => 'A2312, Street 1, City 1',
            'phone' => '1234567890',
            'email' => 'asd@ada.com',
            'city'  => 'City 1',
            'country' => 'Country 1',
            'fax' => '1234567890',
            'website' => 'www.example.com',
            'note' => 'This is a note',
        ]);
    }
}
