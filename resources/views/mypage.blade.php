<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="max-w-md mx-auto min-h-screen bg-slate-100 pb-20">

    <!-- ヘッダー -->
    <div class="relative h-32 overflow-hidden">

        <img
            src="{{ asset('images/user-header.png') }}"
            alt="ユーザーヘッダー"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/15"></div>

        <div class="absolute inset-0 flex items-center">

            <a href="{{ route('home') }}"
                class="text-white text-2xl font-bold pl-4"
            >
                ←
            </a>

            <h1 class="text-white text-2xl font-bold mx-auto pr-10">
                マイページ
            </h1>

        </div>

    </div>

    <div class="p-4 space-y-4">

        <!-- ユーザー情報 -->
        <div class="bg-white rounded-xl p-4 shadow">

            <h2 class="font-bold text-lg mb-3">
                ユーザー情報
            </h2>

            <p>
                ニックネーム：
                {{ Auth::user()->name }}
            </p>

            <p class="mt-2">
                メールアドレス：
                {{ Auth::user()->email }}
            </p>

        </div>

        <!-- 投稿数 -->
        <a href="{{ route('mypage.posts') }}"
            class="
                block
                bg-white
                rounded-xl
                p-4
                shadow

                hover:shadow-xl
                hover:-translate-y-1
                hover:scale-105
                active:scale-95

                transition
                duration-200
            "
        >

            <h2 class="font-bold text-lg mb-2">
                投稿数
            </h2>

            <p class="text-3xl font-bold text-blue-500">
                {{ Auth::user()->posts->count() }} 件
            </p>

        </a>

        <!-- お気に入り数 -->
        <a href="{{ route('mypage.favorites') }}"
            class="
                block
                bg-white
                rounded-xl
                p-4
                shadow

                hover:shadow-xl
                hover:-translate-y-1
                hover:scale-105
                active:scale-95

                transition
                duration-200
            "
        >

            <h2 class="font-bold text-lg mb-2">
                お気に入り数
            </h2>

            <p class="text-3xl font-bold text-pink-500">
                {{ Auth::user()->favorites->count() }} 件
            </p>

        </a>

        <!-- お気に入り生き物一覧 -->
        <div class="bg-white rounded-xl p-4 shadow">

            <div class="flex justify-between items-center mb-4">

                <h2 class="font-bold text-lg">
                    お気に入り生き物一覧
                </h2>

                <a href="{{ route('mypage.favorites') }}"
                    class="text-blue-500 text-sm"
                >
                    もっと見る >
                </a>

            </div>

           <div class="grid grid-cols-4 gap-2">

    @forelse(
        Auth::user()->favorites
            ->shuffle()
            ->take(4)
        as $favorite
    )

            <a href="{{ route('species.show', [
                'species' => $favorite->species->id,
                'from' => 'favorites'
            ]) }}"
            class="
                block
                bg-white
                rounded-xl
                shadow
                p-2

                hover:shadow-xl
                hover:-translate-y-1
                hover:scale-105
                active:scale-95

                transition
                duration-200
            "
            >

            <img
                src="{{ asset($favorite->species->image_path) }}"
                alt="{{ $favorite->species->name }}"
                class="w-20 h-20 object-cover rounded-lg mx-auto"
            >

            <p class="text-xs text-center mt-2 font-medium">
                {{ $favorite->species->name }}
            </p>

        </a>

    @empty

        <p class="col-span-4 text-gray-500">
            お気に入りの生き物はありません
        </p>

    @endforelse

</div>

        </div>

        <!-- 自分の投稿一覧 -->
        <div class="bg-white rounded-xl p-4 shadow">

            <div class="flex justify-between items-center mb-4">

                <h2 class="font-bold text-lg">
                    自分の投稿一覧
                </h2>

                <a href="{{ route('mypage.posts') }}"
                    class="text-blue-500 text-sm whitespace-nowrap"
                >
                    もっと見る >
                </a>

            </div>

            @forelse(
                Auth::user()->posts
                    ->sortByDesc('created_at')
                    ->take(3)
                as $post
            )

                    <a href="{{ route('posts.show', [
                        'post' => $post->id,
                        'from' => 'mypage'
                    ]) }}"
                    class="
                        flex
                        items-center
                        gap-3
                        border-b
                        py-3

                        hover:bg-slate-50
                        active:scale-95

                        transition
                        duration-200
                    "
                >

                    @if ($post->image_path)

                        <img
                            src="{{ 
                                \Str::startsWith($post->image_path, 'images/')
                                    ? asset($post->image_path)
                                    : asset('storage/' . $post->image_path)
                            }}"
                            alt="{{ $post->title }}"
                            class="w-14 h-14 object-cover rounded-lg"
                        >

                    @endif

                    <div class="flex-1">

                        <p class="font-medium">
                            {{ $post->title }}
                        </p>

                    </div>

                    <div class="text-xs text-gray-500">
                        {{ $post->created_at->format('Y/m/d') }}
                    </div>

                </a>

            @empty

                <p class="text-gray-500">
                    投稿はありません
                </p>

            @endforelse

        </div>

        <!-- ログアウト -->
        <div class="bg-white rounded-xl p-4 shadow">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="font-bold text-lg">
                        ログアウト
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        ログアウトして、アプリを終了します。
                    </p>

                </div>

                <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

                <button
                    type="button"
                    onclick="openLogoutModal()"
                    class="
                        flex items-center gap-3
                        px-5 py-4 rounded-xl
                        text-lg font-semibold transition
                        border
                        border-red-500
                        text-red-500
                        hover:bg-red-500
                        hover:text-white
                    "
                >
                    ログアウト
                </button>

            </div>

        </div>

    </div>

</div>

<!-- ログアウト確認モーダル -->
<div
    id="logoutModal"
    class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50"
>

    <div class="bg-white rounded-2xl p-6 w-80 shadow-xl">

        <h3 class="text-lg font-bold text-center">
            ログアウトしますか？
        </h3>

        <p class="text-sm text-gray-500 text-center mt-2">
            ログアウトすると、再度ログインが必要になります。
        </p>

        <div class="flex gap-3 mt-6">

            <button
                type="button"
                onclick="closeLogoutModal()"
                class="flex-1 border border-gray-300 py-2 rounded-lg"
            >
                キャンセル
            </button>

            <button
                type="button"
                onclick="document.getElementById('logoutForm').submit()"
                class="flex-1 bg-red-500 text-white py-2 rounded-lg"
            >
                ログアウト
            </button>

        </div>

    </div>

</div>

@include('components.bottom-nav')

<script>

function openLogoutModal()
{
    document
        .getElementById('logoutModal')
        .classList.remove('hidden');
}

function closeLogoutModal()
{
    document
        .getElementById('logoutModal')
        .classList.add('hidden');
}

</script>

</body>
</html>