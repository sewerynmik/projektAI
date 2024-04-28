<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Haul;

class HaulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Haul::truncate();
        });

        Haul::insert([
            [
                'fisherman_id' => 1,
                'fish_id' => 1,
                'fishery_id' => 1,
                'data' => '2024-04-23',
            ],
            [
                'fisherman_id' => 2,
                'fish_id' => 2,
                'fishery_id' => 2,
                'data' => '2024-04-23',
            ],
            [
                'fisherman_id' => 3,
                'fish_id' => 3,
                'fishery_id' => 3,
                'data' => '2024-04-23',
            ]
        ]);
    }
}
