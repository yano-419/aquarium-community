<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント編集</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100">

    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

           <a href="{{ route('posts.show', $comment->post_id) }}"
                class="text-white text-2xl pl-4"
            >
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                コメント編集
            </h1>

        </div>

    </div>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="p-4">
        @csrf
        @method('PUT')

        <textarea
            name="content"
            rows="6"
            class="w-full border rounded-lg p-3"
        >{{ old('content', $comment->content) }}</textarea>

        <button
            type="submit"
            class="w-full mt-4 bg-blue-500 text-white py-3 rounded-xl"
        >
            更新
        </button>

    </form>

</div>

</body>
</html>