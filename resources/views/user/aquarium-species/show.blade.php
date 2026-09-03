<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $aquariumSpecies->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-24">

    {{-- ヘッダー --}}
    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">
            
            <a href="javascript:history.back()"
                class="text-white text-2xl pl-4"
            >
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                生き物詳細
            </h1>

        </div>

    </div>

    {{-- 本体 --}}
    <div class="p-4">

        <img src="{{ asset($aquariumSpecies->image_path) }}"
            alt="{{ $aquariumSpecies->name }}"
            class="w-full rounded-2xl shadow"
        >

        <div class="bg-white rounded-2xl shadow mt-4 p-5">

            <h2 class="text-2xl font-bold">
                {{ $aquariumSpecies->name }}
            </h2>

            <p class="text-gray-500 italic mt-2">
                {{ $aquariumSpecies->scientific_name }}
            </p>

            <div class="mt-4 space-y-2">

                <p>
                    <span class="font-bold">分類：</span>
                    {{ $aquariumSpecies->classification }}
                </p>

                <p>
                    <span class="font-bold">目：</span>
                    {{ $aquariumSpecies->order_name }}
                </p>

                <p>
                    <span class="font-bold">科：</span>
                    {{ $aquariumSpecies->family_name }}
                </p>

                <p>
                    <span class="font-bold">説明：</span>
                    {{ $aquariumSpecies->description }}
                </p>

            </div>

        </div>

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>