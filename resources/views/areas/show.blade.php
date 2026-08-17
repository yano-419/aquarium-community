<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $area->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center justify-between px-4">

          <a href="{{ request()->input('from') === 'index'
        ? route('areas.index', $area->aquarium_id)
        : (
            request()->input('from') === 'species-areas'
                ? route('species.areas', $area->species->first()->id)
                : route('aquariums.show', $area->aquarium_id)
        )
}}"
class="text-white text-2xl font-bold">
    ←
</a>
            <h1 class="text-white text-2xl font-bold">
                展示エリア
            </h1>

            <div class="w-6"></div>

        </div>

    </div>

    <img
        src="{{ asset($area->image_path) }}"
        alt="{{ $area->name }}"
        class="w-full"
    />

    <div class="p-5">

        <h2 class="text-2xl font-bold">
            {{ $area->name }}
        </h2>

        <p class="mt-3 text-gray-600">
            {{ $area->description }}
        </p>

        <div class="mt-6">

            <h3 class="font-bold text-lg mb-3">
                展示されている生き物
            </h3>

            <div class="grid grid-cols-3 gap-3">

                @forelse ($area->species->take(3) as $species)

                    <a href="{{ route('species.show', $species->id) }}">

                        <img
                            src="{{ asset($species->image_path) }}"
                            alt="{{ $species->name }}"
                            class="w-full h-30 object-cover rounded-xl"
                        >

                        <p class="text-xs text-center mt-2">
                            {{ $species->name }}
                        </p>

                    </a>

                @empty

                    <p class="col-span-4 text-gray-500">
                        生き物情報はありません
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>