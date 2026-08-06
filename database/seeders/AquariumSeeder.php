<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aquarium;

class AquariumSeeder extends Seeder
{
    public function run(): void
    {
        Aquarium::create([
            'name' => '海遊館',
            'prefecture' => '大阪府',
            'address' => '大阪府大阪市港区海岸通1-1-10',
            'description' => '太平洋を中心とした世界の自然環境を再現した世界最大級の水族館。',
            'image_path' => 'images/kaiyukan.jpg',
            'official_url' => 'https://www.kaiyukan.com',
        ]);

        Aquarium::create([
            'name' => 'サンシャイン水族館',
            'prefecture' => '東京都',
            'address' => '東京都豊島区東池袋3-1',
            'description' => '都会の真ん中で楽しめる天空のオアシス。',
            'image_path' => 'images/sunshine-aquarium.jpg',
            'official_url' => 'https://sunshinecity.jp',
        ]);

        Aquarium::create([
            'name' => '名古屋港水族館',
            'prefecture' => '愛知県',
            'address' => '愛知県名古屋市港区港町1-3',
            'description' => '日本最大級のスケールを誇る水族館。',
            'image_path' => 'images/nagoya-aquarium.jpg',
            'official_url' => 'https://www.nagoyaaqua.jp',
        ]);

        Aquarium::create([
            'name' => '鳥羽水族館',
            'prefecture' => '三重県',
            'address' => '三重県鳥羽市鳥羽3-3-6',
            'description' => '飼育種類数日本有数の大型水族館。',
            'image_path' => 'images/toba-aquarium.jpg',
            'official_url' => 'https://aquarium.co.jp',
        ]);

        Aquarium::create([
            'name' => '沖縄美ら海水族館',
            'prefecture' => '沖縄県',
            'address' => '沖縄県国頭郡本部町石川424',
            'description' => '巨大水槽とジンベエザメで有名な水族館。',
            'image_path' => 'images/churaumi.jpg',
            'official_url' => 'https://churaumi.okinawa',
        ]);
    }
}