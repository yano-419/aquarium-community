<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    @include('staff.partials.sidebar')

    <div class="flex-1">

        <!-- 共通ヘッダー -->
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
                    @yield('header-title')
                </h1>

            </div>

        </header>

        @yield('content')

    </div>

</div>

</body>
</html>