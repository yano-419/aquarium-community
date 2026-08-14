<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
        alt="ヘッダー画像"
        class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            <a href="{{ route('posts.index') }}" class="text-white text-2xl pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                投稿詳細
            </h1>

        </div>

    </div>

    <div class="p-4">

        <div class="bg-white rounded-xl shadow p-4">

            <p class="text-sm text-gray-500">
                {{ $post->user->name }}
                ・
                {{ $post->created_at->diffForHumans() }}
            </p>

            <h2 class="font-bold text-xl mt-2">
                {{ $post->title }}
            </h2>

            <p class="mt-3 text-gray-700">
                {{ $post->content }}
            </p>

             <img src="{{ asset($post->image_path) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-52 object-cover rounded-lg mt-4">

            <div class="mt-4 text-gray-500">
                💬 3
            </div>

        </div>

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>