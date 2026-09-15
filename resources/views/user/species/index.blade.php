<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>生き物図鑑</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt=""
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/10"></div>

        <div class="absolute inset-0 flex items-center">

              <a href="{{ route('home') }}" class="text-white text-2xl font-bold pl-4">
              <img
            src="{{ asset('images/icons/back.png') }}"
            alt="戻る"
            class="
                flex
                items-center
                justify-center

                w-14 h-14

                rounded-full

                hover:bg-white/20
                hover:shadow-lg
                hover:-translate-y-1
                hover:scale-110

                transition
                duration-200
                 "
            >
              </a>

        <h1 class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold pointer-events-none">
          生き物図鑑
        </h1>

</div>

    </div>

    <!-- 検索 -->
    <div class="-mt-8 px-4 relative z-10">

        <div class="bg-white rounded-full shadow-lg p-3">

           <form method="GET">

             <input
              type="text"
              name="keyword"
              value="{{ request('keyword') }}"
              placeholder="生き物を検索"
              class="w-full outline-none"
             >
            
          </form>

        </div>
             <p class="text-sm text-gray-500 mt-2">
               {{ $species->total() }}件
             </p>

    </div>

   <!-- 図鑑一覧 -->
<div class="grid grid-cols-3 gap-3 p-4 mt-4">

    @foreach ($species as $animal)

        <a href="{{ route('species.show', $animal->id) }}"
       class="
        bg-white
        rounded-xl
        shadow
        p-2

        hover:shadow-xl
        hover:-translate-y-1
        hover:scale-[1.03]
        active:scale-[0.98]

        transition
        duration-200
    "
    >

            <img
                src="{{ asset($animal->image_path) }}"
                alt="{{ $animal->name }}"
                class="w-full aspect-square object-cover rounded-lg"
            >

            <p class="text-center text-xs font-bold mt-2">
                {{ $animal->name }}
            </p>

        </a>

    @endforeach

</div>
<div class="mt-6">

    <div class="text-center text-sm text-gray-500 mb-3">

        全 {{ $species->total() }} 件中

        {{ $species->firstItem() }}
        ～

        {{ $species->lastItem() }}

        件を表示

    </div>

    <div class="flex justify-center">

        {{ $species->links() }}

    </div>

</div>

</div>

@include('components.bottom-nav')

</body>
</html>