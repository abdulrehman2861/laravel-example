<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Auto Glass Admin',
            'email' => 'admin@autoglass.com',
            'type' => User::TYPE_ADMIN,
            'password' => Hash::make('admin123'),
        ]);
    }
}
