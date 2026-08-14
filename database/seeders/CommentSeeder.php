<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Comment::create([
            'post_id' => 1,
            'user_id' => $user->id,
            'content' => 'わかります！何回見てもかわいくて癒されますよね。',
        ]);

        Comment::create([
            'post_id' => 1,
            'user_id' => $user->id,
            'content' => 'また見に行きたくなりますね！',
        ]);

    }
}