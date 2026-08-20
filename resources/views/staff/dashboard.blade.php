@extends('layouts.staff')

@section('title', '水族館担当者ダッシュボード')

@section('content')

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
<div
    class="flex"
    style="
        background-image: url('{{ asset('images/dashboard-background.png') }}');
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    "
>

    <!-- 中央 -->
    <main
        class="flex-1 p-10 min-h-[calc(100vh-80px)]"
    >

        <h2 class="text-3xl font-bold mb-2">
            こんにちは、
            {{ auth()->user()->name }}
            さん
        </h2>

        <p class="text-gray-600 mb-10">
            今日も素敵な水族館運営を！
        </p>

        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">

            <!-- 展示エリア数 -->
            <div class="bg-white rounded-3xl shadow-lg p-14 text-center">

                <div class="w-20 h-20 mx-auto mb-4">
                    <img
                        src="{{ asset('images/area-icon.png') }}"
                        alt="Area Icon"
                        class="w-full h-full object-contain"
                    >
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

                <div class="w-20 h-20 mx-auto mb-4">
                    <img
                        src="{{ asset('images/species-icon.png') }}"
                        alt="Species Icon"
                        class="w-full h-full object-contain"
                    >
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
    <aside class="w-80 p-8 pr-12 space-y-6">

        <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

            <div class="w-20 h-20 mx-auto mb-4">
                <img
                    src="{{ asset('images/staff-icon.png') }}"
                    alt="Staff Icon"
                    class="w-full h-full object-contain"
                >
            </div>

            <h3 class="text-green-600 font-bold">
                担当者数
            </h3>

            <p class="text-5xl font-bold mt-3">
                1
            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

            <div class="w-20 h-20 mx-auto mb-4">
                 <img
                    src="{{ asset('images/status-icon.png') }}"
                    alt="Status Icon"
                    class="w-full h-full object-contain"
                >
            </div>

            <h3 class="text-green-600 font-bold">
                ステータス
            </h3>

            <p class="text-2xl font-bold mt-3">
                Active
            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 text-center">

            <div class="w-20 h-20 mx-auto mb-4">
                <img
                    src="{{ asset('images/update-icon.png') }}"
                    alt="Update Icon"
                    class="w-full h-full object-contain"
                >
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

@endsection