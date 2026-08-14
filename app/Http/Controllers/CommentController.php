<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}