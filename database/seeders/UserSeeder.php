<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder
{
    public static function run(): void
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
