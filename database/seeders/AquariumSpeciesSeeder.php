<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aquarium;
use App\Models\Species;

class AquariumSpeciesSeeder extends Seeder
{
    public function run(): void
    {
        $kaiyukan = Aquarium::where('name', '海遊館')->first();
        $sunshine = Aquarium::where('name', 'サンシャイン水族館')->first();
        $nagoya = Aquarium::where('name', '名古屋港水族館')->first();
        $toba = Aquarium::where('name', '鳥羽水族館')->first();
        $churaumi = Aquarium::where('name', '沖縄美ら海水族館')->first();

        $otter = Species::where('name', 'ラッコ')->first();
        $penguin = Species::where('name', 'ペンギン')->first();
        $jellyfish = Species::where('name', 'ミズクラゲ')->first();
        $whaleShark = Species::where('name', 'ジンベエザメ')->first();
        $seaBream = Species::where('name', 'タイ')->first();
        $otter2 = Species::where('name', 'カワウソ')->first();
        $sardine = Species::where('name', 'イワシ')->first();
        $gardenEel = Species::where('name', 'チンアナゴ')->first();
        $clownfish = Species::where('name', 'カクレクマノミ')->first();
        $seaTurtle = Species::where('name', 'ウミガメ')->first();
        $dolphin = Species::where('name', 'イルカ')->first();
        $seal = Species::where('name', 'アザラシ')->first();

        $toba->species()->attach($otter->id);

        $kaiyukan->species()->attach($penguin->id);
        $nagoya->species()->attach($penguin->id);

        $kaiyukan->species()->attach($jellyfish->id);

        $churaumi->species()->attach($whaleShark->id);

        $nagoya->species()->attach($seaBream->id);

        $sunshine->species()->attach($otter2->id);

        $kaiyukan->species()->attach($sardine->id);

        $sunshine->species()->attach($gardenEel->id);

        $kaiyukan->species()->attach($clownfish->id);
        $churaumi->species()->attach($clownfish->id);

        $churaumi->species()->attach($seaTurtle->id);

        $nagoya->species()->attach($dolphin->id);

        $sunshine->species()->attach($seal->id);
    }
}