<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水族館担当者ダッシュボード</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="max-w-5xl mx-auto min-h-screen p-6">

    <h1 class="text-3xl font-bold mb-2">
        水族館担当者ダッシュボード
    </h1>

    <p class="text-gray-600 mb-6">
        こんにちは、{{ auth()->user()->name }} さん
    </p>

    <div class="grid grid-cols-2 gap-4">

        <div class="bg-white rounded-2xl shadow p-6 text-center">

            <h2 class="text-blue-600 font-bold">
                展示エリア数
            </h2>

            <p class="text-5xl font-bold mt-4">
                {{ $areaCount }}
            </p>

            <p class="mt-2 text-gray-500">
                エリア
            </p>

        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">

            <h2 class="text-cyan-600 font-bold">
                登録生き物数
            </h2>

            <p class="text-5xl font-bold mt-4">
                {{ $speciesCount }}
            </p>

            <p class="mt-2 text-gray-500">
                種類
            </p>

        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-4 mt-6">

        <a href="#"
            class="bg-white rounded-xl shadow p-5 hover:bg-slate-50">
            展示エリア管理
        </a>

        <a href="#"
            class="bg-white rounded-xl shadow p-5 hover:bg-slate-50">
            生き物管理
        </a>

        <a href="#"
            class="bg-white rounded-xl shadow p-5 hover:bg-slate-50">
            プロフィール
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full bg-white rounded-xl shadow p-5 text-left hover:bg-slate-50"
            >
                ログアウト
            </button>
        </form>

    </div>

</div>

</body>
</html>