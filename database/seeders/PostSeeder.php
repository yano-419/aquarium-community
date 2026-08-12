<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Post::create([
            'user_id' => $user->id,
            'title' => 'ラッコがかわいすぎた…！',
            'content' => 'ごはんを食べる姿がとても可愛かったです。また会いに行きたい！',
            'image_path' => 'images/otter.jpg',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'ジンベエザメの迫力すごい！',
            'content' => '間近で見ると本当に大きくて感動しました。',
            'image_path' => 'images/whale-shark.jpg',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'ペンギンのお散歩タイム',
            'content' => 'よちよち歩きがとても可愛かったです。',
            'image_path' => 'images/penguin.jpg',
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'クラゲ展示が幻想的でした！',
            'content' => 'ずっと見ていられるくらい綺麗でした。',
            'image_path' => 'images/jellyfish.jpg',
        ]);
    }
}