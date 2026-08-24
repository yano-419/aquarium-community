@extends('layouts.staff')

@section('title', '生き物編集')

@section('header-title', '生き物編集')

@section('content')

<div class="pt-4 px-10 pb-10">

    <div class="w-full mx-auto bg-white rounded-3xl shadow-lg p-12">

        <h2 class="text-3xl font-bold text-blue-700 mb-10">
            生き物情報を編集
        </h2>

        <form action="{{ route('staff.species.update', $species) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="grid grid-cols-12 gap-8">

             {{-- 左側 --}}
                <div class="col-span-5">

                    {{-- 生き物名 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            生き物名
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $species->name) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    {{-- 学名 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            学名
                        </label>

                        <input
                            type="text"
                            name="scientific_name"
                            value="{{ old('scientific_name', $species->scientific_name) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-6">

                        {{-- 現在の画像 --}}
                        <div>

                            <p class="text-sm text-gray-500 mb-2">
                                現在の画像
                            </p>

                            <img src="{{ asset($species->image_path) }}"
                                alt="{{ $species->name }}"
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
                <div class="col-span-7">

                    {{-- 分類 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            分類
                        </label>

                        <input
                            type="text"
                            name="classification"
                            value="{{ old('classification', $species->classification) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    {{-- 目 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            目
                        </label>

                        <input
                            type="text"
                            name="order_name"
                            value="{{ old('order_name', $species->order_name) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    {{-- 科 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            科
                        </label>

                        <input
                            type="text"
                            name="family_name"
                            value="{{ old('family_name', $species->family_name) }}"
                            class="w-full border rounded-xl p-4 text-lg"
                        >

                    </div>

                    {{-- 生き物説明 --}}
                    <div class="mb-5">

                        <label class="block text-lg font-semibold mb-2">
                            生き物説明
                        </label>

                        <textarea
                            name="dictionary_description"
                            rows="14"
                            class="w-full border rounded-xl p-4 text-lg"
                        >{{ old('dictionary_description', $species->dictionary_description) }}</textarea>

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
                    更新
                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const imageInput =
        document.getElementById('image');

    const imagePreview =
        document.getElementById('image-preview');

    const placeholder =
        document.getElementById('upload-placeholder');

    const removeButton =
        document.getElementById('remove-image');

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

});

</script>

@endsection