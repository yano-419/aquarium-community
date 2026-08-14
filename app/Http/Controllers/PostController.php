<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Optional image validation
        ]);
    $imagePath = null;

    if ($request->hasFile('image')) {

        $imagePath = $request
            ->file('image')
            ->store('posts', 'public');
    }

    Post::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'content' => $request->content,
        'image_path' => $imagePath,
    ]);

    return redirect()->route('posts.index');
}
}