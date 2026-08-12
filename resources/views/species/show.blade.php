<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $species->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-40 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt=""
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

              <a href="{{ route('species.index') }}"
               class="text-white text-2xl font-bold pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                生き物詳細
            </h1>

        </div>

    </div>

    <!-- 画像 -->
    <div class="p-4">

        <img
            src="{{ asset($species->image_path) }}"
            alt="{{ $species->name }}"
            class="w-full rounded-2xl shadow"
        >

        <div class="bg-white rounded-2xl shadow mt-4 p-5">

            <h2 class="text-2xl font-bold">
                {{ $species->name }}
            </h2>

            <p class="text-blue-600 mt-2">
                分類：{{ $species->classification }}
            </p>

            <div class="mt-4">
                <h3 class="font-bold">
                    説明
                </h3>

                <p class="text-gray-700 mt-2 leading-relaxed">
                    {{ $species->description }}
                </p>
            </div>

        </div>

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>