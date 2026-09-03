<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with([
            'user',
            'comments',
        ]);

        if ($keyword = $request->keyword) {

            $query->where(
                'title',
                'like',
                "%{$keyword}%"
            );

        }

        $posts = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.posts.index',
            compact('posts')
        );
    }

    public function show(Post $post)
    {
    $post->load([
        'user',
        'comments.user',
    ]);

    return view(
        'admin.posts.show',
        compact('post')
    );
    }

    public function destroy(Post $post)
    {
    $post->delete();

    return redirect()
        ->route('admin.posts.index')
        ->with(
            'success',
            '投稿を削除しました'
        );
    }
}