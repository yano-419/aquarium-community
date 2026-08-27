<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入り一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            <a
                href="{{ route('mypage') }}"
                class="text-white text-2xl pl-4"
            >
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                お気に入り一覧
            </h1>

        </div>

    </div>
<div class="flex justify-between items-center px-4 py-3">

    <p class="font-bold">
        全 {{ $favorites->count() }} 件
    </p>

    <p class="text-sm text-gray-500">
        お気に入り生き物
    </p>

</div>
    <!-- 一覧 -->
    <div class="p-4 space-y-3">

        @forelse ($favorites as $favorite)

            <a href="{{ route('species.show', [
    'species' => $favorite->species->id,
    'from' => 'favorites'
]) }}" class="flex items-center gap-3 bg-white rounded-xl shadow p-4">

                <img
                    src="{{ asset($favorite->species->image_path) }}"
                    alt="{{ $favorite->species->name }}"
                    class="w-16 h-16 object-cover rounded-lg"
                >

                <div class="flex-1">

                    <p class="font-bold">
                        {{ $favorite->species->name }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $favorite->species->classification }}
                    </p>

                </div>

            </a>

        @empty

            <div class="bg-white rounded-xl shadow p-4 text-gray-500">
                お気に入りの生き物はありません
            </div>

        @endforelse

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>