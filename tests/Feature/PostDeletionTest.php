<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_deleting_a_post_redirects_to_the_users_post_list(): void
    {
        $user = User::factory()->create();
        $post = Post::create([
            'user_id' => $user->id,
            'title' => '削除テスト',
            'content' => '削除後の遷移を確認します。',
        ]);

        $response = $this->actingAs($user)
            ->delete(route('posts.destroy', $post));

        $response->assertRedirect(route('mypage.posts'));
        $response->assertSessionHas('success', '投稿を削除しました');
        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}