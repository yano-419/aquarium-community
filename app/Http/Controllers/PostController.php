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

     public function destroy(Post $post)
    {
    $post->delete();

    return redirect()
        ->route('posts.index')
        ->with('success', '投稿を削除しました');
    }

    public function edit(Post $post)
 {
    return view('posts.edit', compact('post'));
 }

 public function update(Request $request, Post $post)
 {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {

        $imagePath = $request
            ->file('image')
            ->store('posts', 'public');

        $post->image_path = $imagePath;
    }

    $post->title = $request->title;
    $post->content = $request->content;

    $post->save();

    return redirect()
        ->route('posts.show', $post)
        ->with('success', '投稿を更新しました');
  }

  public function myPosts()
  {
    $posts = auth()->user()
        ->posts()
        ->latest()
        ->get();

    return view('posts.my-posts', compact('posts'));
  }
}