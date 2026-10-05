<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン選択</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    <div
        class="min-h-screen bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/login-background.png') }}');"
    >

        <div class="text-center pt-16 md:pt-24">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="ロゴ"
                class="w-20 h-20 mx-auto"
            >

            <h1 class="mt-4 text-3xl font-bold text-blue-950">
                水族館コミュニティシステム
            </h1>

            <p class="mt-3 text-lg text-blue-900">
                ログインするユーザーを選択してください
            </p>

        </div>

        <div
            class="max-w-md mx-auto mt-8 bg-white/95 rounded-3xl shadow-2xl p-8"
        >

            <div class="space-y-4">

                <a href="{{ route('login') }}"
                    class="
                        block
                        text-center
                        bg-blue-500
                        text-white
                        py-4
                        rounded-xl
                        font-bold

                        hover:bg-blue-600
                        hover:scale-105

                        transition
                    "
                >
                    一般ユーザー
                </a>

                <a href="{{ route('staff.login') }}"
                    class="
                        block
                        text-center
                        bg-green-500
                        text-white
                        py-4
                        rounded-xl
                        font-bold

                        hover:bg-green-600
                        hover:scale-105

                        transition
                    "
                >
                    水族館担当者
                </a>

                <a href="{{ route('admin.login') }}"
                    class="
                        block
                        text-center
                        bg-red-500
                        text-white
                        py-4
                        rounded-xl
                        font-bold

                        hover:bg-red-600
                        hover:scale-105

                        transition
                    "
                >
                    システム管理者
                </a>

            </div>

        </div>

    </div>

</body>
</html>