<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'role' => 'a',
                'fisherman_id' => 1
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('user'),
                'role' => 'u',
                'fisherman_id' => 2
            ]
        ]);
    }
}
