<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Fishery;

class FisherySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Fishery::truncate();
        });

        Fishery::insert([
            [
                'name' => 'Rybacka Spółdzielnia Pracy "Wieloryb"',
                'voivodeship' => 'Pomorskie',
                'parish' => 'Gdańsk',
                'locality' => 'Gdańsk',
            ],
            [
                'name' => 'Rybacka Spółdzielnia Pracy "Mors"',
                'voivodeship' => 'Pomorskie',
                'parish' => 'Gdynia',
                'locality' => 'Gdynia',
            ],
            [
                'name' => 'Rybacka Spółdzielnia Pracy "Rybak"',
                'voivodeship' => 'Pomorskie',
                'parish' => 'Sopot',
                'locality' => 'Sopot',
            ]
        ]);
    }
}
