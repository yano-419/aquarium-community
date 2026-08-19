<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水族館担当者ダッシュボード</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- サイドバー -->
    <aside class="w-80 bg-gradient-to-b from-sky-400 to-blue-600 text-white shadow-xl">

        <div class="py-8 flex flex-col items-center border-b border-sky-300">

     <img
        src="{{ asset('images/logo.png') }}"
        alt="ロゴ"
        class="w-24 h-24 bg-white rounded-full p-2 shadow-md"
    >

    <h2 class="text-2xl font-bold mt-4">
        Aquarium Community
    </h2>

    <p class="mt-2 text-sm text-sky-100">
        管理メニュー
    </p>

</div>

        <nav class="p-4 space-y-3">

            <a href="{{ route('staff.dashboard') }}"
                class="block rounded-xl px-5 py-4 text-lg font-semibold bg-sky-500 hover:bg-sky-400 transition"
            >
                🏠 ダッシュボード
            </a>

            <a href="#"
                class="block rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                🏛 展示エリア管理
            </a>

            <a href="#"
                class="block rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                🐟 生き物管理
            </a>

            <a href="{{ route('profile.edit') }}"
                class="block rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                👤 プロフィール
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="w-full text-left rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
                >
                    🚪 ログアウト
                </button>
            </form>

        </nav>

    </aside>

    <!-- 右エリア -->
    <div class="flex-1">

        <!-- ヘッダー -->
       <header
    class="
        relative
        overflow-hidden
        text-white
        shadow
        bg-cover
        bg-center
    "
    style="
        background-image:
        url('{{ asset('images/ocean-background.jpg') }}');
    "
>

    <div class="absolute inset-0 bg-blue-900/40"></div>

    <div class="relative h-20 flex items-center justify-center">

        <h1 class="text-3xl md:text-4xl font-bold">
            水族館担当者ダッシュボード
        </h1>

    </div>

</header>

        <!-- メインコンテンツ -->
        <div class="flex">

            <!-- 中央 -->
            <main class="flex-1 p-10">

                <h2 class="text-3xl font-bold mb-2">
                    こんにちは、
                    {{ auth()->user()->name }}
                    さん
                </h2>

                <p class="text-gray-600 mb-10">
                    今日も素敵な水族館運営を！
                </p>

                <div class="grid md:grid-cols-2 gap-10 max-w-4xl">

                    <!-- 展示エリア数 -->
                    <div class="bg-white rounded-3xl shadow-lg p-14 text-center">

                        <div class="text-6xl mb-4">
                            🏛
                        </div>

                        <h3 class="text-blue-600 font-bold text-2xl">
                            展示エリア数
                        </h3>

                        <p class="text-9xl font-bold mt-6">
                            {{ $areaCount }}
                        </p>

                        <p class="text-gray-500 mt-2">
                            エリア
                        </p>

                    </div>

                    <!-- 生き物数 -->
                    <div class="bg-white rounded-3xl shadow-lg p-14 text-center">

                        <div class="text-6xl mb-4">
                            🐟
                        </div>

                        <h3 class="text-cyan-600 font-bold text-2xl">
                            登録生き物数
                        </h3>

                        <p class="text-9xl font-bold mt-6">
                            {{ $speciesCount }}
                        </p>

                        <p class="text-gray-500 mt-2">
                            種類
                        </p>

                    </div>

                </div>

            </main>

            <!-- 右側情報 -->
            <aside class="w-80 p-8 space-y-6">

                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

                    <div class="text-4xl mb-3">
                        👥
                    </div>

                    <h3 class="text-green-600 font-bold">
                        担当者数
                    </h3>

                    <p class="text-5xl font-bold mt-3">
                        1
                    </p>

                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

                    <div class="text-4xl mb-3">
                        ✅
                    </div>

                    <h3 class="text-green-600 font-bold">
                        ステータス
                    </h3>

                    <p class="text-2xl font-bold mt-3">
                        Active
                    </p>

                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

                    <div class="text-4xl mb-3">
                        🕒
                    </div>

                    <h3 class="text-indigo-600 font-bold">
                        最終更新
                    </h3>

                    <p class="mt-3 text-lg">
                        {{ now()->format('Y/m/d') }}
                    </p>

                </div>

            </aside>

        </div>

    </div>

</div>

</body>
</html>