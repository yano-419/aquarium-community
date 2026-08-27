<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>展示エリア一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-24">

    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
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
                生き物展示エリア一覧
            </h1>

            <div class="w-6"></div>

        </div>

    </div>

    <div class="p-5">

        <h2 class="text-xl font-bold mb-4">
            {{ $species->name }} の展示エリア
        </h2>

        @forelse ($species->areas as $area)

            <a href="{{ route('areas.show', $area->id) }}?from=species"
               class="flex gap-3 bg-white rounded-xl shadow p-3 mb-4">

                <img
                    src="{{ asset($area->image_path) }}"
                    alt="{{ $area->name }}"
                    class="w-24 h-20 object-cover rounded-lg"
                >

                <div class="flex-1">

                    <h3 class="font-bold">
                        {{ $area->name }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $area->description }}
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        {{ $area->aquarium->name }}
                    </p>

                </div>

            </a>

        @empty

            <p class="text-gray-500">
                展示エリアはありません
            </p>

        @endforelse

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>