@extends('layouts.admin')

@section('title', '投稿管理')

@section('header-title', '投稿管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-3xl font-bold text-blue-700">
                投稿一覧
            </h2>

            <form action="{{ route('admin.posts.index') }}" method="GET">

                <input
                    type="search"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    placeholder="タイトルで検索"
                    class="
                        border
                        rounded-xl
                        px-4
                        py-3
                        w-[400px]
                    "
                >

            </form>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="p-4 text-left">
                        画像
                    </th>

                    <th class="p-4 text-left">
                        投稿者
                    </th>

                    <th class="p-4 text-left">
                        タイトル
                    </th>

                    <th class="p-4 text-center">
                        投稿日
                    </th>

                    <th class="p-4 text-center">
                        コメント数
                    </th>

                    <th class="p-4 text-center">
                        操作
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($posts as $post)

                    <tr class="border-b">

                        <td class="p-4">

                            @if(Str::startsWith($post->image_path, 'posts/'))

                                <img
                                    src="{{ asset('storage/' . $post->image_path) }}"
                                    alt="{{ $post->title }}"
                                    class="w-24 h-16 object-cover rounded-lg"
                                >

                            @else

                                <img
                                    src="{{ asset($post->image_path) }}"
                                    alt="{{ $post->title }}"
                                    class="w-24 h-16 object-cover rounded-lg"
                                >

                            @endif

                        </td>

                        <td class="p-4">

                            {{ $post->user->name }}

                        </td>

                        <td class="p-4 font-semibold">

                            {{ $post->title }}

                        </td>

                        <td class="p-4 text-center">

                            {{ $post->created_at->format('Y/m/d') }}

                        </td>

                        <td class="p-4 text-center">

                            {{ $post->comments->count() }}

                        </td>

                        <td class="p-4">

                            <div
                                class="flex justify-center gap-2"
                            >

                                <a href="{{ route('admin.posts.show', $post->id) }}"
                                    class="
                                        px-4
                                        py-2
                                        border
                                        border-blue-500
                                        text-blue-500
                                        rounded-xl
                                        hover:bg-blue-500
                                        hover:text-white
                                        transition
                                    "
                                >
                                    詳細
                                </a>

                                <button
                                    type="button"
                                    onclick="openDeleteModal({{ $post->id }})"
                                    class="
                                        px-4
                                        py-2
                                        border
                                        border-red-500
                                        text-red-500
                                        rounded-xl
                                        hover:bg-red-500
                                        hover:text-white
                                        transition
                                    "
                                >
                                    削除
                                </button>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="
                                p-10
                                text-center
                                text-gray-500
                            "
                        >
                            投稿はありません
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-8 flex justify-center">

            {{ $posts->links() }}

        </div>

    </div>

</div>

{{-- 削除モーダル --}}

<div
    id="deleteModal"
    class="
        fixed
        inset-0
        bg-black/50
        hidden
        flex
        items-center
        justify-center
        z-50
    "
>

    <div
        class="
            bg-white
            rounded-2xl
            p-6
            w-96
            shadow-xl
        "
    >

        <h3
            class="
                text-lg
                font-bold
                text-center
            "
        >
            投稿を削除しますか？
        </h3>

        <div class="flex gap-3 mt-6">

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="
                    flex-1
                    border
                    border-gray-300
                    py-2
                    rounded-lg
                "
            >
                キャンセル
            </button>

            <form
                id="deletePostForm"
                method="POST"
                class="flex-1"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="
                        w-full
                        bg-red-500
                        text-white
                        py-2
                        rounded-lg
                    "
                >
                    削除
                </button>

            </form>

        </div>

    </div>

</div>

<script>

function openDeleteModal(id)
{
    document
        .getElementById('deletePostForm')
        .action =
        `/admin/posts/${id}`;

    document
        .getElementById('deleteModal')
        .classList.remove('hidden');
}

function closeDeleteModal()
{
    document
        .getElementById('deleteModal')
        .classList.add('hidden');
}

</script>

@endsection