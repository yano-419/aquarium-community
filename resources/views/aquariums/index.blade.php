<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水族館一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

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

        <a href="{{ route('home') }}" class="text-white text-2xl font-bold">
            ←
        </a>

        <h1 class="text-white text-2xl font-bold">
            水族館一覧
        </h1>

        <div class="w-6"></div>

    </div>

</div>

    <!-- 検索欄 -->
    <div class="-mt-8 px-4 relative z-10">

     <div class="bg-white rounded-full shadow-lg p-3">

        <form method="GET">

         <input
          type="text"
          name="keyword"
          value="{{ request('keyword') }}"
          placeholder="水族館名・エリアで検索"
          class="w-full outline-none"
         >
         
        </form>

      </div>

     <div class="flex justify-between items-center px-4 mt-4 mb-3">

     <p class="font-bold">
         全 {{ count($aquariums) }} 件
     </p>

     <p class="text-gray-500 text-sm">
         おすすめ順
     </p>

     </div>

    </div>

 <!-- 水族館カード -->
<div class="space-y-4 px-3">

    @foreach ($aquariums as $aquarium)

    <a href="{{ route('aquariums.show', $aquarium->id) }}" class="block bg-white rounded-2xl shadow overflow-hidden p-3">

        <div class="flex items-center gap-3">

            <img
                src="{{ asset($aquarium->image_path) }}"
                alt="{{ $aquarium->name }}"
                class="w-30 h-28 object-cover rounded-lg flex-shrink-0"
            >

            <div class="flex-1">

                <h2 class="font-bold text-lg">
                    {{ $aquarium->name }}
                </h2>

                <p class="text-blue-600 text-sm mt-1">
                    📍 {{ $aquarium->prefecture }}
                </p>

                <p class="text-gray-600 text-sm mt-2">
                    {{ Str::limit($aquarium->description, 35) }}
                </p>

            </div>

        </div>

    </a>

    @endforeach

</div>
@include('components.bottom-nav')
</div>
</body>
</html>