<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/header.png') }}"
             class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            {{ route('home') }} text-2xl pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                投稿一覧
            </h1>

        </div>

    </div>

    <div class="p-4 space-y-4">

        @foreach ($posts as $post)

            <div class="bg-white rounded-xl shadow p-4">

                <div class="flex items-center gap-2 text-sm text-gray-500">

                    <span>
                        {{ $post->user->name }}
                    </span>

                    <span>
                        {{ $post->created_at->diffForHumans() }}
                    </span>

                </div>

                <h2 class="font-bold text-lg mt-2">
                    {{ $post->title }}
                </h2>

                <p class="mt-2 text-gray-700">
                    {{ $post->content }}
                </p>

            </div>

        @endforeach

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>