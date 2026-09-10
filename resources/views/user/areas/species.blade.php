<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $area->aquarium->name }} - {{ $area->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-24">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center justify-between px-4">

            <a href="{{ route('areas.show', $area->id) }}"
               class="text-white text-2xl font-bold">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold">
                生き物一覧
            </h1>

            <div class="w-6"></div>

        </div>

    </div>

    <div class="p-5">

        <h2 class="text-xl font-bold mb-2">
            {{ $area->aquarium->name }}の{{ $area->name }}の生き物
        </h2>

        <p class="font-bold mb-3">
            全{{ $area->species->count() }}種
        </p>

        @forelse ($area->species as $animal)

            <a href="{{ route('aquarium-species.show', [
                    'aquariumSpecies' => $animal->id,
                    'from' => 'area-species',
                    'area' => $area->id
                ]) }}"
               class="
                    flex
                    gap-3
                    bg-white
                    rounded-xl
                    shadow
                    p-3
                    mb-3
                    cursor-pointer

                    hover:shadow-xl
                    hover:-translate-y-1
                    hover:scale-105
                    active:scale-95

                    transition
                    duration-200
               ">

                <img
                    src="{{ asset($animal->image_path) }}"
                    alt="{{ $animal->name }}"
                    class="w-20 h-20 object-cover rounded-lg"
                >

                <div class="flex-1">

                    <h3 class="font-bold">
                        {{ $animal->name }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $animal->classification }}
                    </p>

                </div>

            </a>

        @empty

            <p class="text-gray-500">
                生き物情報はありません
            </p>

        @endforelse

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>