@extends('layouts.admin')

@section('title', '担当者管理')

@section('header-title', '担当者管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-3xl font-bold text-blue-700">
                担当者一覧
            </h2>

            <div class="flex items-center gap-4">

                <form action="{{ route('admin.staff.index') }}" method="GET">

                    <input
                        type="search"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="名前・メールアドレスで検索"
                        class="
                            border
                            rounded-xl
                            px-4
                            py-3
                            w-[400px]
                        "
                    >

                </form>

                <a href="#"
                    class="
                        px-6
                        py-3
                        bg-blue-500
                        text-white
                        rounded-xl
                        hover:bg-blue-600
                        transition
                    "
                >
                    ＋ 新しい担当者を登録
                </a>

            </div>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="p-4 text-left">
                        担当者名
                    </th>

                    <th class="p-4 text-left">
                        所属水族館
                    </th>

                    <th class="p-4 text-left">
                        メールアドレス
                    </th>

                    <th class="p-4 text-center">
                        権限
                    </th>

                    <th class="p-4 text-center">
                        操作
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($staffs as $staff)

                <tr class="border-b">

                    <td class="p-4">
                        {{ $staff->user->name }}
                    </td>

                    <td class="p-4">
                        {{ $staff->aquarium->name }}
                    </td>

                    <td class="p-4">
                        {{ $staff->user->email }}
                    </td>

                    <td class="p-4 text-center">

                        <span
                            class="
                                px-3 py-1
                                bg-blue-100
                                text-blue-600
                                rounded-full
                            "
                        >
                            staff
                        </span>

                    </td>

                    <td class="p-4 text-center">

                        <div class="flex justify-center gap-2">

                            <a href="#"
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
                                編集
                            </a>

                            <button
                                type="button"
                                onclick="openDeleteModal({{ $staff->id }})"
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

                @endforeach

            </tbody>

        </table>

        <div class="mt-8 flex justify-center">

            {{ $staffs->links() }}

        </div>

    </div>

</div>

<div
    id="deleteModal"
    class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50"
>

    <div class="bg-white rounded-2xl p-6 w-96 shadow-xl">

        <h3 class="text-lg font-bold text-center">
            削除しますか？
        </h3>

        <p class="text-sm text-gray-500 text-center mt-2">
            この担当者を削除してよろしいですか？
        </p>

        <div class="flex gap-3 mt-6">

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="flex-1 border border-gray-300 py-2 rounded-lg"
            >
                キャンセル
            </button>

            <form
                id="deleteStaffForm"
                method="POST"
                class="flex-1"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded-lg"
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
        .getElementById('deleteStaffForm')
        .action = `/admin/staff/${id}`;

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