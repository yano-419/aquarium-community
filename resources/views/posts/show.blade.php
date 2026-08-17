<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@php
    use Illuminate\Support\Str;
@endphp
<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-44">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
            alt="ヘッダー画像"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

           <a href="{{ request()->get('from') === 'mypage'
            ? route('mypage.posts')
            : route('posts.index')
           }}"
           class="text-white text-2xl pl-4">
           ←
           </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                投稿詳細
            </h1>

        </div>

    </div>

    <div class="p-4">

        <div class="bg-white rounded-xl shadow p-4">

            <p class="text-sm text-gray-500">
                {{ $post->user->name }}
                ・
                {{ $post->created_at->diffForHumans() }}
            </p>

            <h2 class="font-bold text-xl mt-2">
                {{ $post->title }}
            </h2>

            <p class="mt-3 text-gray-700">
                {{ $post->content }}
            </p>

            @if ($post->image_path)

                <img src="{{ 
                Str::startsWith($post->image_path, 'images/')
                    ? asset($post->image_path)
                    : asset('storage/' . $post->image_path)
                }}"
                    alt="{{ $post->title }}"
                    class="w-full h-64 object-contain rounded-lg mt-4 bg-slate-100"
                >

            @endif

            <div class="mt-4 text-gray-500">
                💬 {{ $post->comments->count() }}
            </div>

            @if (auth()->id() === $post->user_id)

                <div class="flex justify-end gap-2 mt-4">

                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg"
                    >
                        編集
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('この投稿を削除しますか？')"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                        >
                            削除
                        </button>

                    </form>

                </div>
            @endif
        </div>

    </div>

    <div class="px-4 mt-6">

        <h3 class="font-bold text-lg mb-3">
            コメント
        </h3>

        @foreach ($post->comments as $comment)

            <div class="border-t py-3">

                <div class="flex justify-between items-center">

                    <p class="font-bold text-sm">
                        {{ $comment->user->name }}
                    </p>

                   @if (auth()->id() === $comment->user_id)

    <div class="flex gap-2">

        <a href="{{ route('comments.edit', $comment->id) }}"
            class="bg-blue-500 text-white text-xs px-3 py-1 rounded"
        >
            編集
        </a>

        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="bg-red-500 text-white text-xs px-3 py-1 rounded"
            >
                削除
            </button>
        </form>

    </div>

@endif

                </div>

                <p class="text-gray-700 mt-1">
                    {{ $comment->content }}
                </p>

            </div>

        @endforeach

        <div class="fixed bottom-16 left-1/2 -translate-x-1/2 w-full max-w-md bg-slate-100 p-4 border-t">

            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-2">
                @csrf

                <div class="flex gap-2 items-end">

                    <textarea
                        name="content"
                        rows="3"
                        class="flex-1 rounded-lg border p-3"
                        placeholder="コメントを入力してください"
                    ></textarea>

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                    >
                        投稿
                    </button>

                </div>

            </form>

        </div>

    </div>

@include('components.bottom-nav')

</body>
</html>