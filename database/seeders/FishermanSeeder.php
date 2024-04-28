<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Fisherman;

class FishermanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Fisherman::truncate();
        });

        Fisherman::insert([
            [

                'name' => 'Jan',
                'surname' => 'Kowalski',
                'age' => 45,
                'phone_number' => 123456789,
                'email' => 'jan@email.com',
                'address' => 'ul. Kowalskiego 1, 00-001 Warszawa'
            ],
            [
                'name' => 'Adam',
                'surname' => 'Nowak',
                'age' => 35,
                'phone_number' => 987654321,
                'email' => 'adam@email.com',
                'address' => 'ul. Nowaka 2, 00-002 Warszawa'
            ],
            [
                'name' => 'Anna',
                'surname' => 'Kowalczyk',
                'age' => 28,
                'phone_number' => 567890123,
                'email' => 'anna@email.com',
                'address' => 'ul. Kowalczyk 3, 00-003 Warszawa'
            ],
            [
                'name' => 'Piotr',
                'surname' => 'Lewandowski',
                'age' => 52,
                'phone_number' => 456789012,
                'email' => 'piotr@email.com',
                'address' => 'ul. Lewandowskiego 4, 00-004 Warszawa'
            ]

        ]);
    }
}
