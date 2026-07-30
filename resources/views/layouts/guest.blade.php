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

        <div class="min-h-screen bg-gradient-to-b from-sky-200 to-sky-400">

            <div class="text-center pt-12">
                <a href="/">
                    <x-application-logo class="w-24 h-24 mx-auto text-sky-900" />
                </a>

                <h1 class="mt-4 text-3xl font-bold text-sky-900">
                    水族館コミュニティシステム
                </h1>

                <p class="mt-3 text-lg text-sky-800">
                    － 生き物好きがつながる場所 －
                </p>
            </div>

            <div class="max-w-md mx-auto mt-6 bg-white rounded-t-[40px] shadow-lg p-8">
                {{ $slot }}
            </div>

        </div>

    </body>
</html>