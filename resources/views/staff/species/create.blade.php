@extends('layouts.staff')

@section('title', '生き物登録')

@section('header-title', '生き物管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <h2 class="text-3xl font-bold text-blue-700 mb-8">
            新しい生き物を登録
        </h2>

        <form action="{{ route('staff.species.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="grid grid-cols-2 gap-8">

                {{-- 左側 --}}
                <div>

                    {{-- 生き物名 --}}
                    <div class="mb-4">

                        <label class="block text-lg font-semibold mb-2">
                            生き物名
                        </label>

                        <input
                            type="text"
                            name="name"
                            required
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        >

                    </div>

                    {{-- 学名 --}}
                    <div class="mb-6">

                        <label class="block text-lg font-semibold mb-2">
                            学名
                        </label>

                        <input
                            type="text"
                            name="scientific_name"
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        >

                    </div>

                    {{-- 生き物画像 --}}
                    <div>

                        <label class="block text-lg font-semibold mb-2">
                            生き物画像
                        </label>

                        <label
                            for="image"
                            id="image-container"
                            class="
                                relative
                                mt-2
                                flex
                                items-center
                                justify-center
                                w-full
                                min-h-[500px]
                                border-2
                                border-dashed
                                border-gray-300
                                rounded-xl
                                cursor-pointer
                                overflow-auto
                                bg-white
                            "
                        >

                            <div
                                id="upload-placeholder"
                                class="flex flex-col items-center justify-center"
                            >

                                <span class="text-5xl">
                                    📷
                                </span>

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
                                    w-8
                                    h-8
                                    rounded-full
                                    shadow-lg
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

                {{-- 右側 --}}
                <div>

                    {{-- 分類 --}}
                    <div class="mb-4">

                        <label class="block text-lg font-semibold mb-2">
                            分類
                        </label>

                        <input
                            type="text"
                            name="classification"
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        >

                    </div>

                    {{-- 目 --}}
                    <div class="mb-4">

                        <label class="block text-lg font-semibold mb-2">
                            目
                        </label>

                        <input
                            type="text"
                            name="order_name"
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        >

                    </div>

                    {{-- 科 --}}
                    <div class="mb-4">

                        <label class="block text-lg font-semibold mb-2">
                            科
                        </label>

                        <input
                            type="text"
                            name="family_name"
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        >

                    </div>

                    {{-- 生き物説明 --}}
                    <div class="mb-4">

                        <label class="block text-lg font-semibold mb-2">
                            生き物説明
                        </label>

                        <textarea
                            name="dictionary_description"
                            rows="16"
                            class="
                                w-full
                                border
                                border-gray-300
                                rounded-xl
                                px-4
                                py-3
                            "
                        ></textarea>

                    </div>

                </div>

            </div>

            <hr class="my-8">

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

                <a href="{{ route('staff.species.index') }}"
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
                    登録
                </button>

            </div>

        </form>

    </div>

</div>

<script>

const imageInput =
    document.getElementById('image');

const imagePreview =
    document.getElementById('image-preview');

const placeholder =
    document.getElementById('upload-placeholder');

const removeButton =
    document.getElementById('remove-image');

imageInput.addEventListener('change', function (event) {

    const file = event.target.files[0];

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

removeButton.addEventListener('click', function (e) {

    e.preventDefault();

    imageInput.value = '';

    imagePreview.src = '';

    imagePreview.classList.add('hidden');

    placeholder.classList.remove('hidden');

    removeButton.classList.add('hidden');
});

</script>

@endsection