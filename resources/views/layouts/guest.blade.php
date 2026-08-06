<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('images/login-background.png') }}');">

            <div class="text-center pt-16 md:pt-24">
                <a href="/">
                    <img
                     src="{{ asset('images/logo.png') }}"
                     alt="ロゴ"
                     class="w-24 h-24 object-contain mx-auto">
                </a>

                <h1 class="mt-4 text-3xl font-bold text-blue-950">
                    水族館コミュニティシステム
                </h1>

                <p class="mt-3 text-lg text-blue-900">
                    － 生き物好きがつながる場所 －
                </p>
            </div>

            <div class="max-w-md mx-auto mt-8 bg-white/95 rounded-3xl shadow-2xl p-8">
                {{ $slot }}
            </div>

        </div>

    </body>
</html>