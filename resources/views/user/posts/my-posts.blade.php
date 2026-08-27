<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自分の投稿一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}" alt="ユーザーヘッダー" class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

           <a href="{{ route('mypage') }}" class="text-white text-2xl pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                自分の投稿一覧
            </h1>

        </div>

    </div>

    <div class="p-4 space-y-4">

        @forelse ($posts as $post)

            <a href="{{ route('posts.show', [
            'post' => $post->id,
           'from' => 'mypage'
           ]) }}" class="block bg-white rounded-xl shadow p-4">

                <div class="flex items-center gap-3">

                    @if ($post->image_path)

                        <img
                            src="{{

                                \Illuminate\Support\Str::startsWith($post->image_path, 'images/')
                                    ? asset($post->image_path)
                                    : asset('storage/' . $post->image_path)
                            }}"
                            alt="{{ $post->title }}"
                            class="w-16 h-16 object-cover rounded-lg"
                        >

                    @endif

                    <div class="flex-1">

                        <p class="font-semibold">
                            {{ $post->title }}
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            {{ $post->created_at->format('Y/m/d') }}
                        </p>

                    </div>

                </div>

            </a>

        @empty

            <div class="bg-white rounded-xl p-4 text-gray-500">
                投稿はありません
            </div>

        @endforelse

    </div>

</div>

@include('components.bottom-nav')

</body>
</html>