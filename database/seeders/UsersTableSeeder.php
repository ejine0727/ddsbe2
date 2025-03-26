<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'testuser',
            'password' => Hash::make('testpassword'), // Use Hash::make() instead of bcrypt()
            'gender' => 'Male',
        ]);
    }
}
