@extends('layouts.admin')

@section('title', '水族館編集')

@section('header-title', '水族館編集')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-12">

        <form action="{{ route('admin.aquariums.update', $aquarium->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-10">

                {{-- 左側 --}}
                <div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2 text-lg">
                            水族館名
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $aquarium->name) }}"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2 text-lg">
                            住所
                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ old('address', $aquarium->address) }}"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2 text-lg">
                            公式サイトURL
                        </label>

                        <input
                            type="url"
                            name="official_url"
                            value="{{ old('official_url', $aquarium->official_url) }}"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div>

                        <label class="block font-bold mb-2 text-lg">
                            説明
                        </label>

                        <textarea
                            name="description"
                            rows="12"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >{{ old('description', $aquarium->description) }}</textarea>

                    </div>

                </div>

                {{-- 右側 --}}
                <div>

                    {{-- 現在の画像 --}}
                    <div class="mb-6">

                        <p class="text-sm text-gray-500 mb-2">
                            現在の画像
                        </p>

                        <img src="{{ asset($aquarium->image_path) }}"
                            alt="{{ $aquarium->name }}"
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

                <a href="{{ route('admin.aquariums.index') }}"
                    class="
                        px-12
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
                        px-12
                        py-5
                        bg-blue-600
                        text-white
                        rounded-xl
                        text-lg
                    "
                >
                    更新
                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener(
    'DOMContentLoaded',
    () => {

        const imageInput =
            document.getElementById('image');

        const imagePreview =
            document.getElementById('image-preview');

        const placeholder =
            document.getElementById(
                'upload-placeholder'
            );

        const removeButton =
            document.getElementById(
                'remove-image'
            );

        imageInput.addEventListener(
            'change',
            function () {

                const file = this.files[0];

                if (!file) {
                    return;
                }

                const reader =
                    new FileReader();

                reader.onload = function (e) {

                    imagePreview.src =
                        e.target.result;

                    imagePreview
                        .classList
                        .remove('hidden');

                    placeholder
                        .classList
                        .add('hidden');

                    removeButton
                        .classList
                        .remove('hidden');

                };

                reader.readAsDataURL(file);

            }
        );

        removeButton.addEventListener(
            'click',
            function () {

                imageInput.value = '';

                imagePreview.src = '';

                imagePreview
                    .classList
                    .add('hidden');

                placeholder
                    .classList
                    .remove('hidden');

                removeButton
                    .classList
                    .add('hidden');

            }
        );

    }
);

</script>

@endsection