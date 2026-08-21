@extends('layouts.staff')

@section('title', '展示エリア編集')

@section('header-title', '展示エリア編集')

@section('content')

<div class="pt-4 px-10 pb-10">

    <div class="w-full mx-auto bg-white rounded-3xl shadow-lg p-12">

       <h2 class="text-3xl font-bold text-blue-700 mb-10">
    展示エリアを編集
</h2>

        <form
           action="{{ route('staff.areas.update', $area) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @method('PUT')
            @csrf

            <div class="grid grid-cols-12 gap-8">

                {{-- 左側 --}}
                <div class="col-span-7">

                    {{-- 展示エリア名 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            展示エリア名
                        </label>

                       <input
                         type="text"
                         name="name"
                         value="{{ old('name', $area->name) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    {{-- 説明 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            説明
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="w-full border rounded-xl p-4 text-lg"
                        > {{ old('description', $area->description) }}</textarea>

                    </div>

                   <div class="grid grid-cols-2 gap-6 mb-6">

    {{-- 現在の画像 --}}
    <div>

        <p class="text-sm text-gray-500 mb-2">
            現在の画像
        </p>

        <img src="{{ asset($area->image_path) }}"
            alt="{{ $area->name }}"
            class="
                w-full
                h-72
                object-contain
                bg-white
                border
                rounded-xl
            "
        >

    </div>

    {{-- 新しい画像 --}}
    <div>

        <p class="text-sm text-gray-500 mb-2">
            新しい画像
        </p>

        <label
            for="image"
            id="image-container"
            class="
                relative
                flex
                items-center
                justify-center
                w-full
                h-72
                border-2
                border-dashed
                border-gray-300
                rounded-xl
                cursor-pointer
                overflow-hidden
                bg-white
            "
        >

            <div
                id="upload-placeholder"
                class="flex flex-col items-center justify-center"
            >
                <span class="text-5xl">📷</span>

                <span class="mt-2 font-medium">
                    画像を選択
                </span>

                <span class="text-xs text-gray-400 mt-1">
                    JPG / PNG
                </span>
            </div>

            <img
                id="image-preview"
                class="
                    hidden
                    w-full
                    h-full
                    object-contain
                    bg-white
                "
            >

            <button
                type="button"
                id="remove-image"
                class="
                    hidden
                    absolute
                    top-2
                    right-2
                    bg-red-500
                    text-white
                    w-7
                    h-7
                    rounded-full
                    shadow-lg
                    flex
                    items-center
                    justify-center
                    z-20
                "
            >
                ✕
            </button>

        </label>

        <input
            id="image"
            type="file"
            name="image"
            accept="image/*"
            class="hidden"
        >

    </div>

</div>
                </div>

                {{-- 右側 --}}
                <div class="col-span-5">
                    <div id="hidden-species-inputs">

                        @foreach($area->species as $animal)
                            <input
                                type="hidden"
                                name="species_ids[]"
                                value="{{ $animal->id }}"
                                id="hidden-{{ $animal->id }}"
                            >
                        @endforeach

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        選択済み生物
                    </h3>

                    <div
                        id="selected-species"
                        class="
                            border
                            rounded-xl
                            h-72
                            overflow-y-auto
                            p-4
                            bg-slate-50
                            mb-6
                        "
                    >

                        <div id="selected-species-list">

                            @foreach($area->species as $animal)

                                <div
                                    id="selected-{{ $animal->id }}"
                                    class="flex justify-between items-center py-3 border-b"
                                >

                                    <div class="flex items-center gap-3">

                                        <img src="{{ asset($animal->image_path) }}"
                                            alt="{{ $animal->name }}"
                                            class="w-12 h-12 rounded-lg object-cover"
                                        >

                                        <span>
                                            {{ $animal->name }}
                                        </span>

                                    </div>

                                    <button
                                        type="button"
                                        class="
                                            remove-species
                                            bg-red-500
                                            text-white
                                            w-10
                                            h-10
                                            rounded-xl
                                            text-lg
                                            hover:bg-red-600
                                        "
                                        data-id="{{ $animal->id }}"
                                    >
                                        −
                                    </button>

                                </div>

                            @endforeach

                        </div>

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        生き物を追加する
                    </h3>

                    <input
                        type="search"
                        id="species-search"
                        placeholder="生き物名で検索"
                        class="
                            w-full
                            border
                            rounded-xl
                            p-3
                            mb-4
                        "
                    >

                    <div
                        id="species-list"
                        class="
                            border
                            rounded-xl
                            h-96
                            overflow-y-auto
                            p-3
                        "
                    >

                        @foreach($species as $animal)

                            <div
                                class="species-item flex justify-between items-center py-3 border-b gap-3"
                                data-species-id="{{ $animal->id }}"
                            >

                                <div class="flex items-center gap-3">

                                    <img src="{{ asset($animal->image_path) }}"
                                        alt="{{ $animal->name }}"
                                        class="w-12 h-12 rounded-lg object-cover"
                                    >

                                    <span>
                                        {{ $animal->name }}
                                    </span>

                                </div>

                                <button
                                    type="button"
                                    class="add-species
                                           bg-blue-500
                                           text-white
                                           w-10
                                           h-10
                                           rounded-xl
                                           text-lg
                                           hover:bg-blue-600"
                                    data-id="{{ $animal->id }}"
                                    data-name="{{ $animal->name }}"
                                    data-image="{{ asset($animal->image_path) }}"
                                >
                                    ＋
                                </button>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <div
                class="
                    sticky
                    bottom-0
                    bg-white
                    border-t
                    pt-6
                    pb-2
                    flex
                    justify-end
                    gap-4
                    mt-10
                    z-10
                "
            >

                <a href="{{ route('staff.areas.index') }}"
                    class="
                        px-10
                        py-5
                        border
                        border-red-300
                        bg-red-50
                        rounded-xl
                        text-red-500
                        hover:bg-red-100
                        font-semibold
                        text-lg
                    "
                >
                    キャンセル
                </a>

                <button
                    type="submit"
                    class="
                        bg-blue-600
                        text-white
                        px-10
                        py-5
                        rounded-xl
                        hover:bg-blue-700
                        font-semibold
                        text-lg
                        shadow-lg
                    "
                >
                    更新
                </button>

            </div>

        </form>

    </div>

</div>

<script>
function hiraToKata(str)
{
    return str.replace(
        /[\u3041-\u3096]/g,
        function(match)
        {
            return String.fromCharCode(
                match.charCodeAt(0) + 0x60
            );
        }
    );
}

document.addEventListener('DOMContentLoaded', () => {

    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeButton = document.getElementById('remove-image');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {

            imagePreview.src = e.target.result;

            imagePreview.classList.remove('hidden');

            placeholder.classList.add('hidden');

            removeButton.classList.remove('hidden');
        };

        reader.readAsDataURL(file);
    });

    removeButton.addEventListener('click', function () {

        imageInput.value = '';

        imagePreview.src = '';

        imagePreview.classList.add('hidden');

        placeholder.classList.remove('hidden');

        removeButton.classList.add('hidden');

    });

    // 初期表示されている「選択済み生物」の削除ボタンを有効化
    document
        .querySelectorAll('#selected-species-list .remove-species')
        .forEach(button => {

            button.addEventListener('click', () => {

                const id = button.dataset.id;

                const item = document.getElementById('selected-' + id);
                const input = document.getElementById('hidden-' + id);
                const row = document.querySelector(
                    '.species-item[data-species-id="' + id + '"]'
                );

                if (item) item.remove();
                if (input) input.remove();
                if (row) row.style.display = 'flex';

            });

        });

    // 初期選択済みの生き物は「追加する」候補一覧から隠す
    document
        .querySelectorAll('#selected-species-list [id^="selected-"]')
        .forEach(item => {

            const id = item.id.replace('selected-', '');

            const row = document.querySelector(
                '.species-item[data-species-id="' + id + '"]'
            );

            if (row) row.style.display = 'none';

        });

});

const selectedBox =
    document.getElementById('selected-species-list');

const hiddenInputs =
    document.getElementById('hidden-species-inputs');

document
    .querySelectorAll('.add-species')
    .forEach(button => {

        button.addEventListener('click', () => {

            const id = button.dataset.id;
            const name = button.dataset.name;
            const image = button.dataset.image;

            if (
                document.getElementById(
                    'selected-' + id
                )
            ) {
                return;
            }

            // 候補一覧から消す
            const speciesRow =
                button.closest('.species-item');

            speciesRow.style.display = 'none';

            // 選択済みエリア作成
            const item =
                document.createElement('div');

            item.id = 'selected-' + id;

            item.className =
                'flex justify-between items-center py-3 border-b';

            item.innerHTML = `
    <div class="flex items-center gap-3">

        <img src="${image}"
            class="w-12 h-12 rounded-lg object-cover"
        >

        <span>${name}</span>

    </div>


    <button
        type="button"
        class="
            bg-red-500
            text-white
            w-10
            h-10
            rounded-xl
            text-lg
            hover:bg-red-600
        "
    >
        −
    </button>
`;

            selectedBox.appendChild(item);

            const input =
                document.createElement('input');

            input.type = 'hidden';
            input.name = 'species_ids[]';
            input.value = id;
            input.id = 'hidden-' + id;

            hiddenInputs.appendChild(input);

            // 削除処理
            item.querySelector('button')
                .addEventListener('click', () => {

                    item.remove();

                    input.remove();

                    // 候補一覧へ戻す
                    speciesRow.style.display =
                        'flex';

                });

        });

    });

const searchInput =
    document.getElementById(
        'species-search'
    );

searchInput.addEventListener(
    'input',
    function () {

        const keyword =
            hiraToKata(
                this.value.toLowerCase()
            );

        document
            .querySelectorAll('.species-item')
            .forEach(item => {

                const id = item.dataset.speciesId;

                // すでに選択済みの生き物は検索結果に関わらず表示しない
                if (
                    document.getElementById('selected-' + id)
                ) {
                    item.style.display = 'none';
                    return;
                }

                const text =
                    hiraToKata(
                        item.textContent.toLowerCase()
                    );

                item.style.display =
                    text.includes(keyword)
                    ? 'flex'
                    : 'none';

            });
    }
);

searchInput.addEventListener(
    'keydown',
    function (e) {

        if (e.key === 'Enter') {

            e.preventDefault();

        }

    }
);
</script>

@endsection