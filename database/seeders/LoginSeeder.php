<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Login;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Login::truncate();
        });

        Login::insert([
            [
                'fisherman_id' => 1,
                'login' => 'admin',
                'password' => 'admin',
                'type' => 'a',
            ],
            [
                'fisherman_id' => 2,
                'login' => 'user',
                'password' => 'user',
                'type' => 'u',
            ],
            [
                'fisherman_id' => 3,
                'login' => 'user2',
                'password' => 'user2',
                'type' => 'u',
            ]
        ]);
    }
}
