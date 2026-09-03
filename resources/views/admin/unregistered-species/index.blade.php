@extends('layouts.admin')

@section('title', '未登録生物管理')

@section('header-title', '未登録生物管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-3xl font-bold text-blue-700">
                未登録生物一覧
            </h2>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="p-4 text-left">
                        画像
                    </th>

                    <th class="p-4 text-left">
                        生き物名
                    </th>

                    <th class="p-4 text-left">
                        学名
                    </th>

                    <th class="p-4 text-left">
                        登録水族館
                    </th>

                    <th class="p-4 text-center">
                        登録日
                    </th>

                    <th class="p-4 text-center">
                        操作
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($species as $item)

                    <tr class="border-b">

                        <td class="p-4">

                            <img
                                src="{{ asset($item->image_path) }}"
                                alt="{{ $item->name }}"
                                class="w-24 h-16 object-cover rounded-lg"
                            >

                        </td>

                        <td class="p-4 font-bold">
                            {{ $item->name }}
                        </td>

                        <td class="p-4">
                            {{ $item->scientific_name ?? '-' }}
                        </td>

                        <td class="p-4">
                            {{ $item->aquarium->name }}
                        </td>

                        <td class="p-4 text-center">
                           {{ $item->created_at?->format('Y/m/d') ?? '-' }}
                        </td>

                        <td class="p-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route(
                                  'admin.species.unregistered.approve',
                                   $item->id
                                   ) }}"
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
                                    図鑑へ登録
                                </a>

                                <button
                                    type="button"
                                    onclick="openDeleteModal({{ $item->id }})"
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
                            class="p-10 text-center text-gray-500"
                        >
                            未登録生物はありません
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-8 flex justify-center">

            {{ $species->links() }}

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
            この未登録生物を削除してよろしいですか？
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
                id="deleteUnregisteredForm"
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
        .getElementById('deleteUnregisteredForm')
        .action = `/admin/unregistered-species/${id}`;

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