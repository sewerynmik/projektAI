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
            ],
            [
                'name' => 'szczupak',
                'species' => 'Esox lucius',
                'description' => 'Szczupak pospolity, szczupak europejski',
            ],
            [
                'name' => 'sandacz',
                'species' => 'Sander lucioperca',
                'description' => 'Sandacz pospolity, sandacz europejski',
            ],
            [
                'name' => 'węgorz',
                'species' => 'Anguilla anguilla',
                'description' => 'Węgorz europejski, węgorz pospolity'],
                [
                    'name' => 'karas',
                    'species' => 'Cyprinus carpio',
                    'description' => 'Karas pospolity, karas europejski',
                ],
                [
                    'name' => 'pstrąg',
                    'species' => 'Salmo trutta',
                    'description' => 'Pstrąg potokowy, pstrąg pospolity',
                ],
                [
                    'name' => 'sum',
                    'species' => 'Silurus glanis',
                    'description' => 'Sum europejski, sum pospolity',
                ],
                [
                    'name' => 'leszcz',
                    'species' => 'Abramis brama',
                    'description' => 'Leszcz pospolity, leszcz europejski',
                ],
                [
                    'name' => 'lin',
                    'species' => 'Tinca tinca',
                    'description' => 'Lin pospolity, lin europejski',
                ],
                [
                    'name' => 'okoń',
                    'species' => 'Perca fluviatilis',
                    'description' => 'Okoń pospolity, okoń europejski',
                ],
                [
                    'name' => 'jazgarz',
                    'species' => 'Sander volgensis',
                    'description' => 'Jazgarz pospolity, jazgarz europejski',
                ],
                [
                    'name' => 'szczupak amurski',
                    'species' => 'Esox reichertii',
                    'description' => 'Szczupak amurski, szczupak syberyjski',
                ],
                [
                    'name' => 'szczupak kanadyjski',
                    'species' => 'Esox masquinongy',
                    'description' => 'Szczupak kanadyjski, szczupak amerykański',
                ],
                [
                    'name' => 'szczupak struwowy',
                    'species' => 'Esox niger',
                    'description' => 'Szczupak struwowy, szczupak czarny',
                ],
                [
                    'name' => 'szczupak siatkowany',
                    'species' => 'Esox lucius',
                    'description' => 'Szczupak siatkowany, szczupak pospolity',
                ],
                [
                    'name' => 'szczupak syberyjski',
                    'species' => 'Esox reichertii',
                    'description' => 'Szczupak syberyjski, szczupak amurski',
                ]
        ]);
    }
}
