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
                'pesel' => '66666666666'
            ],
            [
                'name' => 'Adam',
                'surname' => 'Nowak',
                'age' => 35,
                'phone_number' => 987654321,
                'pesel' => '77777777777'
            ],
            [
                'name' => 'Anna',
                'surname' => 'Kowalczyk',
                'age' => 28,
                'phone_number' => 567890123,
                'pesel' => '88888888888'
            ],
            [
                'name' => 'Piotr',
                'surname' => 'Lewandowski',
                'age' => 52,
                'phone_number' => 456789012,
                'pesel' => '99999999999'
            ]

        ]);
    }
}
