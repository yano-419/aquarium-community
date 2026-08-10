<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', '水族館コミュニティ') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="bg-gradient-to-r from-blue-800 via-blue-600 to-cyan-500 px-5 py-8">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="ロゴ" class="w-12 h-12">
            <h1 class="text-white font-bold text-xl">
                水族館コミュニティ
            </h1>
        </div>
    </div>

    <!-- ヒーロー -->
    <div class="p-3">
        <div class="relative rounded-3xl overflow-hidden shadow-lg">
            <img src="{{ asset('images/home-hero.jpg') }}" alt="メイン画像" class="w-full h-72 object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

            <div class="absolute bottom-4 left-4 text-white">
                <h2 class="text-4xl font-bold">
                    ようこそ！
                </h2>
                <p class="text-lg mt-2">
                    水族館を探して<br>
                    生き物の世界を楽しもう
                </p>
            </div>
        </div>
    </div>

    <!-- メニュー -->
    <div class="grid grid-cols-2 gap-3 px-3">
       <a href="/aquariums" class="bg-gradient-to-br from-sky-400 to-blue-500 text-white rounded-3xl p-5 shadow-lg hover:scale-105 transition">
            <div class="text-4xl text-center mb-3">🏢</div>
            <h3 class="text-xl font-bold text-center">水族館一覧</h3>
            <p class="text-center text-sm mt-2">全国の水族館を探す</p>
        </a>

        <a href="#" class="bg-gradient-to-br from-sky-400 to-blue-500 text-white rounded-3xl p-5 shadow-lg hover:scale-105 transition">
            <div class="text-4xl text-center mb-3">👥</div>
            <h3 class="text-xl font-bold text-center">みんなの投稿</h3>
            <p class="text-center text-sm mt-2">みんなの投稿を見る</p>
        </a>
    </div>

    <!-- おすすめの生き物 -->
    <div class="mt-6 px-3">
        <div class="flex justify-between items-center mb-3">
            <h2 class="font-bold text-lg">🐟 おすすめの生き物</h2>
            <a href="#" class="text-blue-500 text-sm">もっと見る </a>
        </div>

        <div class="flex gap-3 overflow-x-auto pb-2">

            <div class="min-w-[120px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">
                <img src="{{ asset('images/otter.jpg') }}" alt="ラッコ" class="h-28 w-full object-cover rounded-t-xl">
                <div class="p-2">
                    <p class="text-center text-base font-semibold">ラッコ</p>
                    <div class="text-center text-gray-400 mt-1">♡</div>
                </div>
            </div>

            <div class="min-w-[120px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">
                <img src="{{ asset('images/penguin.jpg') }}" alt="ペンギン" class="h-28 w-full object-cover rounded-t-xl">
                <div class="p-2">
                    <p class="text-center text-base font-semibold">ペンギン</p>
                    <div class="text-center text-gray-400 mt-1">♡</div>
                </div>
            </div>

            <div class="min-w-[120px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">
                <img src="{{ asset('images/whale-shark.jpg') }}" alt="ジンベエザメ" class="h-28 w-full object-cover rounded-t-xl">
                <div class="p-2">
                    <p class="text-center text-base font-semibold">ジンベエザメ</p>
                    <div class="text-center text-gray-400 mt-1">♡</div>
                </div>
            </div>

            <div class="min-w-[120px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">
                <img src="{{ asset('images/jellyfish.jpg') }}" alt="ミズクラゲ" class="h-28 w-full object-cover rounded-t-xl">
                <div class="p-2">
                    <p class="text-center text-base font-semibold">ミズクラゲ</p>
                    <div class="text-center text-gray-400 mt-1">♡</div>
                </div>
            </div>

        </div>
    </div>

    <!-- 人気の水族館 -->
<div class="mt-6 px-3">

    <div class="flex justify-between items-center mb-3">
        <h2 class="font-bold text-lg">
            ⭐ 人気の水族館
        </h2>

       <a href="#" class="text-blue-500 text-sm">
            もっと見る >
        </a>
    </div>

    <div class="flex gap-3 overflow-x-auto pb-2">

        <!-- 海遊館 -->
        <div class="min-w-[160px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">

           <img src="{{ asset('images/kaiyukan.jpg') }}" alt="海遊館"
                class="h-28 w-full object-cover rounded-t-xl">

            <div class="p-2">

                <p class="text-base font-semibold text-center">
                    海遊館
                </p>
            </div>

        </div>

        <!-- 鳥羽水族館 -->
        <div class="min-w-[160px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">

             <img src="{{ asset('images/toba-aquarium.jpg') }}" alt="鳥羽水族館"
     class="h-28 w-full object-cover rounded-t-xl">


            <div class="p-2">

                <p class="text-base font-semibold text-center">
                    鳥羽水族館
                </p>
            </div>

        </div>

        <!-- サンシャイン水族館 -->
        <div class="min-w-[160px] bg-white rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition">

            <img src="{{ asset('images/sunshine-aquarium.jpg') }}" alt="サンシャイン水族館"
                class="h-28 w-full object-cover rounded-t-xl">

            <div class="p-2">

                <p class="text-base font-semibold text-center">
                    サンシャイン水族館
                </p>
            </div>

        </div>

    </div>

</div>
</div>
 @include('components.bottom-nav')
</body>
</html>