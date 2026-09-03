@extends('layouts.admin')

@section('title', '投稿詳細')

@section('header-title', '投稿管理')

@section('content')

<a href="{{ route('admin.posts.index') }}"
    class="
        fixed
        top-24
        right-16
        z-50
        inline-flex
        items-center
        gap-2
        px-6
        py-3
        border
        border-blue-500
        bg-white
        text-blue-500
        rounded-xl
        font-semibold
        hover:bg-blue-500
        hover:text-white
        transition
        shadow-lg
    "
>
    ← 一覧へ戻る
</a>

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <div class="flex items-center mb-8">

            <h2 class="text-3xl font-bold text-blue-700">
                投稿詳細
            </h2>

        </div>

        <div class="grid grid-cols-2 gap-12">

            {{-- 画像 --}}
            <div>

                @if(Str::startsWith($post->image_path, 'posts/'))

                    <img
                        src="{{ asset('storage/' . $post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="
                            w-full
                            rounded-2xl
                            shadow
                        "
                    >

                @else

                    <img
                        src="{{ asset($post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="
                            w-full
                            rounded-2xl
                            shadow
                        "
                    >

                @endif

            </div>

            {{-- 投稿情報 --}}
            <div>

                <div class="mb-6">

                    <label class="block font-bold mb-2">
                        投稿者
                    </label>

                    <div class="border rounded-xl p-4 bg-gray-50">

                        {{ $post->user->name }}

                    </div>

                </div>

                <div class="mb-6">

                    <label class="block font-bold mb-2">
                        投稿日
                    </label>

                    <div class="border rounded-xl p-4 bg-gray-50">

                        {{ $post->created_at->format('Y/m/d H:i') }}

                    </div>

                </div>

                <div class="mb-6">

                    <label class="block font-bold mb-2">
                        タイトル
                    </label>

                    <div class="border rounded-xl p-4 bg-gray-50">

                        {{ $post->title }}

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        投稿内容
                    </label>

                    <div
                        class="
                            border
                            rounded-xl
                            p-6
                            bg-gray-50
                            min-h-[180px]
                        "
                    >
                        {{ $post->content }}
                    </div>

                </div>

            </div>

        </div>

        <div class="mt-10">

            <h3 class="text-xl font-bold mb-4">
                コメント一覧
            </h3>

            <div class="space-y-3">

                @forelse($post->comments as $comment)

                    <div
                        class="
                            border
                            rounded-xl
                            p-4
                            bg-white
                        "
                    >

                        <div
                            class="
                                flex
                                justify-between
                                mb-2
                            "
                        >

                            <span class="font-bold">

                                {{ $comment->user->name }}

                            </span>

                            <span
                                class="
                                    text-sm
                                    text-gray-500
                                "
                            >

                                {{ $comment->created_at->format('Y/m/d H:i') }}

                            </span>

                        </div>

                        <p>

                            {{ $comment->content }}

                        </p>

                    </div>

                @empty

                    <div
                        class="
                            border
                            rounded-xl
                            p-4
                            text-gray-500
                        "
                    >

                        コメントはありません

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection