<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Species;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        Species::create([
            'name' => 'ラッコ',
            'classification' => '哺乳類',
            'description' => '貝を割って食べることで有名な海洋哺乳類。',
            'image_path' => 'images/otter.jpg',
        ]);

        Species::create([
            'name' => 'ペンギン',
            'classification' => '鳥類',
            'description' => '泳ぎが得意な飛べない鳥。',
            'image_path' => 'images/penguin.jpg',
        ]);

        Species::create([
            'name' => 'ジンベエザメ',
            'classification' => '魚類',
            'description' => '世界最大の魚類。',
            'image_path' => 'images/whale-shark.jpg',
        ]);
    }
}