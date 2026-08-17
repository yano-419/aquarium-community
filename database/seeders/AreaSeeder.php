<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
     Area::create([
      'aquarium_id' => 1,
      'name' => '大水槽',
      'description' => '大型魚展示エリア',
      'image_path' => 'images/ocean-area.jpg',
    ]);

     Area::create([
      'aquarium_id' => 1,
      'name' => 'クラゲエリア',
      'description' => '幻想的なクラゲ展示',
      'image_path' => 'images/jellyfish-area.jpg',
    ]);

    Area::create([
      'aquarium_id' => 1,
      'name' => 'ペンギンエリア',
      'description' => '人気のペンギン展示',
      'image_path' => 'images/penguin-area.jpg',
    ]);
    }
}