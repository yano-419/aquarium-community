@extends('layouts.staff')

@section('title', '展示エリア管理')

@section('header-title', '展示エリア管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-3xl font-bold text-blue-700">
                展示エリア一覧
            </h2>

            <div class="flex gap-3">

                <input
                    type="text"
                    placeholder="エリア名で検索"
                    class="
                        border
                        border-gray-300
                        rounded-xl
                        px-4
                        py-3
                        w-72
                        text-base
                        focus:ring-2
                        focus:ring-blue-300
                    "
                >

                
                <a href="{{ route('staff.areas.create') }}"
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
                    ＋ 新しい展示エリアを登録
                </a>

            </div>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="w-36 p-4 text-center text-xl font-bold text-slate-700">
                        画像
                    </th>

                    <th class="w-52 p-4 text-left text-xl font-bold text-slate-700">
                        エリア名
                    </th>

                    <th class="p-4 text-left text-xl font-bold text-slate-700">
                        説明
                    </th>

                    <th class="w-36 p-4 text-center text-xl font-bold text-slate-700">
                        生き物数
                    </th>

                    <th class="w-52 p-4 text-center text-xl font-bold text-slate-700">
                        最終更新日
                    </th>

                    <th class="w-52 p-4 text-center text-xl font-bold text-slate-700">
                        操作
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($areas as $area)

                <tr class="border-b hover:bg-slate-50 transition">

                    <td class="p-4 text-center">

                        <img
                            src="{{ asset($area->image_path) }}"
                            alt="{{ $area->name }}"
                            class="w-32 h-20 object-cover rounded-lg shadow mx-auto"
                        >

                    </td>

                    <td class="p-4 text-lg font-semibold">
                        {{ $area->name }}
                    </td>

                    <td class="p-4 text-base">
                        {{ $area->description }}
                    </td>

                    <td class="p-4 text-lg font-semibold text-center">
                        {{ $area->species->count() }}種
                    </td>

                    <td class="p-4 text-base text-center">
                        {{ $area->updated_at->format('Y/m/d') }}
                    </td>

                    <td class="p-4 text-center">

                        <button
                            type="button"
                            onclick="openDeleteModal({{ $area->id }})"
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
                        
                           <a href="{{ route('staff.areas.edit', $area->id) }}"
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

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- 削除確認モーダル -->
<div
    id="deleteModal"
    class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50"
>

    <div class="bg-white rounded-2xl p-6 w-96 shadow-xl">

        <h3 class="text-lg font-bold text-center">
            削除しますか？
        </h3>

        <p class="text-sm text-gray-500 text-center mt-2">
            この展示エリアを削除してよろしいですか？
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
                id="deleteAreaForm"
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

function openDeleteModal(areaId)
{
    const form =
        document.getElementById(
            'deleteAreaForm'
        );

    form.action =
        `/staff/areas/${areaId}`;

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