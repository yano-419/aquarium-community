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
            'order_name' => '食肉目',
            'family_name' => 'イタチ科',
            'scientific_name' => 'Enhydra lutris',
            'description' => '貝を割って食べることで知られる海洋哺乳類。',
            'image_path' => 'images/otter.jpg',
        ]);

        Species::create([
            'name' => 'ペンギン',
            'classification' => '鳥類',
            'order_name' => 'ペンギン目',
            'family_name' => 'ペンギン科',
            'scientific_name' => 'Spheniscidae',
            'description' => '泳ぎが得意な飛べない鳥。',
            'image_path' => 'images/penguin.jpg',
        ]);

        Species::create([
            'name' => 'ミズクラゲ',
            'classification' => '刺胞動物',
            'order_name' => '旗口クラゲ目',
            'family_name' => 'ミズクラゲ科',
            'scientific_name' => 'Aurelia aurita',
            'description' => '日本の水族館でよく見られるクラゲ。',
            'image_path' => 'images/jellyfish.jpg',
        ]);

        Species::create([
            'name' => 'ジンベエザメ',
            'classification' => '魚類',
            'order_name' => 'テンジクザメ目',
            'family_name' => 'ジンベエザメ科',
            'scientific_name' => 'Rhincodon typus',
            'description' => '世界最大の魚類。',
            'image_path' => 'images/whale-shark.jpg',
        ]);

        Species::create([
            'name' => 'タイ',
            'classification' => '魚類',
            'order_name' => 'スズキ目',
            'family_name' => 'タイ科',
            'scientific_name' => 'Pagrus major',
            'description' => '日本で親しまれている海水魚。',
            'image_path' => 'images/sea-bream.jpg',
        ]);

        Species::create([
            'name' => 'カワウソ',
            'classification' => '哺乳類',
            'order_name' => '食肉目',
            'family_name' => 'イタチ科',
            'scientific_name' => 'Lutrinae',
            'description' => '愛らしい姿で人気の半水生動物。',
            'image_path' => 'images/otter2.jpg',
        ]);

        Species::create([
            'name' => 'イワシ',
            'classification' => '魚類',
            'order_name' => 'ニシン目',
            'family_name' => 'ニシン科',
            'scientific_name' => 'Sardinops melanostictus',
            'description' => '群れを作って泳ぐ魚。',
            'image_path' => 'images/sardine.jpg',
        ]);

        Species::create([
            'name' => 'チンアナゴ',
            'classification' => '魚類',
            'order_name' => 'ウナギ目',
            'family_name' => 'アナゴ科',
            'scientific_name' => 'Heteroconger hassi',
            'description' => '砂から顔を出すユニークな魚。',
            'image_path' => 'images/garden-eel.jpg',
        ]);

        Species::create([
            'name' => 'カクレクマノミ',
            'classification' => '魚類',
            'order_name' => 'スズキ目',
            'family_name' => 'スズメダイ科',
            'scientific_name' => 'Amphiprion ocellaris',
            'description' => 'イソギンチャクと共生する魚。',
            'image_path' => 'images/clownfish.jpg',
        ]);

        Species::create([
            'name' => 'ウミガメ',
            'classification' => '爬虫類',
            'order_name' => 'カメ目',
            'family_name' => 'ウミガメ科',
            'scientific_name' => 'Cheloniidae',
            'description' => '海で生活する大型のカメ。',
            'image_path' => 'images/sea-turtle.jpg',
        ]);

        Species::create([
            'name' => 'イルカ',
            'classification' => '哺乳類',
            'order_name' => 'クジラ目',
            'family_name' => 'マイルカ科',
            'scientific_name' => 'Delphinidae',
            'description' => '高い知能を持つ海洋哺乳類。',
            'image_path' => 'images/dolphin.jpg',
        ]);

        Species::create([
            'name' => 'アザラシ',
            'classification' => '哺乳類',
            'order_name' => '食肉目',
            'family_name' => 'アザラシ科',
            'scientific_name' => 'Phocidae',
            'description' => '丸い顔と愛嬌ある姿が特徴。',
            'image_path' => 'images/seal.jpg',
        ]);
    }
}