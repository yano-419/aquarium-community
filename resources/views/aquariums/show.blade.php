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
  <div class="relative h-32 overflow-hidden">

    <img src="{{ asset('images/user-header.png') }}"
        alt="ヘッダー画像"
        class="w-full h-full object-cover"
    >

    <!-- 暗くする -->
    <div class="absolute inset-0 bg-black/10"></div>

    <!-- タイトル -->
    <div class="absolute inset-0 flex items-center justify-between px-4">

        <a href="{{ route('aquariums.index') }}" class="text-white text-2xl font-bold">
            ←
        </a>

        <h1 class="text-white text-2xl font-bold">
            水族館一覧
        </h1>

        <div class="w-6"></div>

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
        <div class="mt-6">

         <h3 class="font-bold text-lg mb-3">
          展示している生き物
         </h3>

         @forelse ($aquarium->species as $animal)

         <a href="{{ route('species.show', $animal->id) }}" class="block bg-slate-100 rounded-lg p-3 mb-2">

             {{ $animal->name }}

         </a>

         @empty

         <p class="text-gray-500">
            展示情報はありません
         </p>

         @endforelse

        </div>

    </div>

</div>
 @include('components.bottom-nav')
</body>
</html>