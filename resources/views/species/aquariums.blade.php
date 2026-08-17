<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>展示水族館一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-24">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt="ユーザーヘッダー"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center justify-between px-4">

            <a href="{{ route('species.show', $species->id) }}"
                class="text-white text-2xl font-bold"
            >
                ←
            </a>

            <h1 class="text-white text-2xl font-bold">
                水族館一覧
            </h1>

            <div class="w-6"></div>

        </div>

    </div>

    <div class="p-5">

        <h2 class="text-xl font-bold mb-4">
            {{ $species->name }} が展示されている水族館
        </h2>

        @forelse ($species->aquariums as $aquarium)

             <a href="{{ route('aquariums.show', $aquarium->id) }}"
                class="flex gap-3 bg-white rounded-xl shadow p-3 mb-4"
            >

                <img
                    src="{{ asset($aquarium->image_path) }}"
                    alt="{{ $aquarium->name }}"
                    class="w-24 h-20 object-cover rounded-lg"
                >

                <div class="flex-1">

                    <h3 class="font-bold">
                        {{ $aquarium->name }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        📍 {{ $aquarium->prefecture }}
                    </p>

                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                        {{ $aquarium->description }}
                    </p>

                </div>

            </a>

        @empty

            <p class="text-gray-500">
                展示している水族館はありません。
            </p>

        @endforelse

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>