<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $aquarium->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="max-w-md mx-auto min-h-screen bg-white">

    <!-- ヘッダー -->
    <div class="bg-gradient-to-r from-blue-800 via-blue-600 to-cyan-500 p-5">

        <div class="flex items-center gap-3">

            <a href="{{ route('aquariums.index') }}"
               class="text-white text-xl">
                ←
            </a>

            <h1 class="text-white text-xl font-bold">
                水族館詳細
            </h1>

        </div>

    </div>

    <!-- メイン画像 -->
    <img src="{{ asset($aquarium->image_path) }}"
        alt="{{ $aquarium->name }}"
        class="w-full h-64 object-cover"
    >

    <!-- 内容 -->
    <div class="p-5">

        <h2 class="text-2xl font-bold">
            {{ $aquarium->name }}
        </h2>

        <p class="mt-3 text-blue-600">
            📍 {{ $aquarium->prefecture }}
        </p>

        <p class="mt-2 text-gray-600">
            {{ $aquarium->address }}
        </p>

        <div class="mt-6">
            <h3 class="font-bold text-lg">
                水族館紹介
            </h3>

            <p class="mt-2 text-gray-700 leading-relaxed">
                {{ $aquarium->description }}
            </p>
        </div>

        <div class="mt-6">
            <a href="{{ $aquarium->official_url }}"
                target="_blank"
                class="block text-center bg-blue-500 text-white py-3 rounded-xl"
            >
                公式サイトを見る
            </a>
        </div>

    </div>

</div>
 @include('components.bottom-nav')
</body>
</html>