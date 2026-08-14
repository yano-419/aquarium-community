<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿作成</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            <a href="{{ route('posts.index') }}" class="text-white text-2xl pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                投稿作成
            </h1>

        </div>

    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">

        @csrf
        <h2 class="text-2xl font-bold mb-4">
            新しい投稿を作成
        </h2>

        <div>
            <label class="font-bold">
                タイトル
            </label>

            <input
                type="text"
                name="title"
                class="w-full border rounded-lg p-3 mt-2"
            >
        </div>

        <div>
            <label class="font-bold">
                本文
            </label>

            <textarea
                name="content"
                rows="6"
                class="w-full border rounded-lg p-3 mt-2"
                placeholder="感想や体験を書いてみましょう"
            ></textarea>
        </div>

        <div>
            <label class="font-bold">
                画像（任意）
            </label>

            <label
                for="image"
                id="image-container"
                class="relative mt-2 flex items-center justify-center w-full min-h-[220px] border-2 border-dashed border-gray-300 rounded-lg cursor-pointer overflow-hidden bg-white"
            >

                <div
                    id="upload-placeholder"
                    class="flex flex-col items-center justify-center"
                >
                    <span class="text-4xl">📷</span>

                    <span class="mt-2 font-medium">
                        画像を選択
                    </span>

                    <span class="text-xs text-gray-400 mt-1">
                        JPG / PNG
                    </span>
                </div>

                <img
                    id="image-preview"
                    class="hidden w-full h-72 object-contain bg-white rounded-lg"
                ><button
                    type="button"
                    id="remove-image"
                    class="hidden absolute top-2 right-2 bg-red-500 text-white w-7 h-7 rounded-full shadow-lg flex items-center justify-center z-20"
                >
                    ✕
                </button>

            </label>

            <input
                id="image"
                type="file"
                name="image"
                accept="image/*"
                class="hidden"
            >
        </div>

        <div class="flex justify-end">

            <button
                type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-xl font-bold"
            >
                投稿
            </button>

        </div>

    </form>

</div>

@include('components.bottom-nav')

</body>
</html>