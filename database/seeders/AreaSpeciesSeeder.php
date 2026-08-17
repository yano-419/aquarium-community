<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSpeciesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('area_species')->insert([
            [
                'area_id' => 1,
                'species_id' => 1,
            ],
            [
                'area_id' => 1,
                'species_id' => 2,
            ],
            [
                'area_id' => 2,
                'species_id' => 3,
            ],
            [
                'area_id' => 3,
                'species_id' => 1,
            ],
        ]);
    }
}