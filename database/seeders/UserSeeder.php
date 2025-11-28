<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin VinSmoke',
            'email' => 'admin@vinsmoke.tg',
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Client Test',
            'email' => 'client@vinsmoke.tg',
            'password' => Hash::make('password123'),
            'is_admin' => false,
        ]);
    }
}
