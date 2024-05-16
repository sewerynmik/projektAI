<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Fish;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Fish::truncate();
        });

        Fish::insert([
            [
                'name' => 'łosoś',
                'species' => 'Salmo salar',
                'description' => 'Łosoś atlantycki, łosoś pospolity, łosoś europejski',
                'image' => 'losos.jpg',
            ],
            [
                'name' => 'szczupak',
                'species' => 'Esox lucius',
                'description' => 'Szczupak pospolity, szczupak europejski',
                'image' => 'szczupak.jpg',
            ],
            [
                'name' => 'sandacz',
                'species' => 'Sander lucioperca',
                'description' => 'Sandacz pospolity, sandacz europejski',
                'image' => 'sandacz.jpg',
            ],
            [
                'name' => 'węgorz',
                'species' => 'Anguilla anguilla',
                'description' => 'Węgorz europejski, węgorz pospolity',
                'image' => 'wegorz.jpg',
            ],
            [
                'name' => 'karas',
                'species' => 'Cyprinus carpio',
                'description' => 'Karas pospolity, karas europejski',
                'image' => 'karas.jpg',
            ],
            [
                'name' => 'pstrąg',
                'species' => 'Salmo trutta',
                'description' => 'Pstrąg potokowy, pstrąg pospolity',
                'image' => 'pstrag.jpg',
            ],
            [
                'name' => 'sum',
                'species' => 'Silurus glanis',
                'description' => 'Sum europejski, sum pospolity',
                'image' => 'sum.jpg',
            ],
            [
                'name' => 'leszcz',
                'species' => 'Abramis brama',
                'description' => 'Leszcz pospolity, leszcz europejski',
                'image' => 'leszcz.jpg',
            ],
            [
                'name' => 'lin',
                'species' => 'Tinca tinca',
                'description' => 'Lin pospolity, lin europejski',
                'image' => 'lin.jpg',
            ],
            [
                'name' => 'okoń',
                'species' => 'Perca fluviatilis',
                'description' => 'Okoń pospolity, okoń europejski',
                'image' => 'okon.jpg',
            ],
            [
                'name' => 'jazgarz',
                'species' => 'Sander volgensis',
                'description' => 'Jazgarz pospolity, jazgarz europejski',
                'image' => 'jazgarz.jpg',
            ],
            [
                'name' => 'szczupak amurski',
                'species' => 'Esox reichertii',
                'description' => 'Szczupak amurski, szczupak syberyjski',
                'image' => 'szczupak.jpg',
            ],
            [
                'name' => 'szczupak kanadyjski',
                'species' => 'Esox masquinongy',
                'description' => 'Szczupak kanadyjski, szczupak amerykański',
                'image' => 'szczupak.jpg',
            ],
            [
                'name' => 'szczupak struwowy',
                'species' => 'Esox niger',
                'description' => 'Szczupak struwowy, szczupak czarny',
                'image' => 'szczupak.jpg',
            ],
            [
                'name' => 'szczupak siatkowany',
                'species' => 'Esox lucius',
                'description' => 'Szczupak siatkowany, szczupak pospolity',
                'image' => 'szczupak.jpg',
            ],
            [
                'name' => 'szczupak syberyjski',
                'species' => 'Esox reichertii',
                'description' => 'Szczupak syberyjski, szczupak amurski',
                'image' => 'szczupak.jpg',
            ]
        ]);
    }
}
