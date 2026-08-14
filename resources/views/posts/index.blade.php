<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20 relative">

    <div class="relative h-32 overflow-hidden">

        <img src="{{ asset('images/user-header.png') }}"
        alt="ヘッダー画像"
        class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            <a href="{{ route('home') }}" class="text-white text-2xl pl-4">
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                投稿一覧
            </h1>

        </div>

    </div>

    <div class="p-4 space-y-4">

        @foreach ($posts as $post)

            <a href="{{ route('posts.show', $post) }}" class="block">

                <div class="bg-white rounded-xl p-4 border">

                <div class="flex items-center gap-2 text-xs text-gray-500">

                    <span>
                        {{ $post->user->name }}
                    </span>

                    <span>
                        {{ $post->created_at->diffForHumans() }}
                    </span>

                </div>

                <h2 class="font-bold text-lg mt-2">
                 {{ $post->title }}
                </h2>

                <p class="mt-2 text-gray-700">
                   {{ $post->content }}
                </p>

                @if ($post->image_path)

                 <img src="{{\Illuminate\Support\Str::startsWith($post->image_path, 'images/')
                 ? asset($post->image_path)
                 : asset('storage/' . $post->image_path)
                 }}"
                 alt="{{ $post->title }}"
                 class="w-full h-48 object-cover rounded-lg mt-3"
                >
               @endif

                 <div class="mt-3 text-gray-500">
                  💬 {{ $post->comments->count() }}
                 </div>
            

            </div>
          </a>
        @endforeach

    </div>



  <a
    href="{{ route('posts.create') }}" class="fixed bottom-24 w-14 h-14 bg-blue-500 text-white rounded-full flex items-center justify-center text-3xl shadow-lg z-50"
    style="right: calc(50% - 180px);"
  >
    +
  </a>
</div>

@include('components.bottom-nav')

</body>
</html>