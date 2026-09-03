@extends('layouts.admin')

@section('title', '生き物編集')

@section('header-title', '図鑑管理')

@section('content')

<div class="p-6">

    <div class="bg-white rounded-3xl shadow-lg p-10">

     @if ($errors->any())

     <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-xl text-sm">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif
        <form action="{{ route('admin.species.update', $species->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-10">

                {{-- 左側 --}}
                <div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            生き物名
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $species->name) }}"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            学名
                        </label>

                        <input
                            type="text"
                            name="scientific_name"
                            value="{{ old('scientific_name', $species->scientific_name) }}"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            分類
                        </label>

                        <input
                            type="text"
                            name="classification"
                            value="{{ old('classification', $species->classification) }}"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            目
                        </label>

                        <input
                            type="text"
                            name="order_name"
                            value="{{ old('order_name', $species->order_name) }}"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            科
                        </label>

                        <input
                            type="text"
                            name="family_name"
                            value="{{ old('family_name', $species->family_name) }}"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div>

                        <p class="text-sm text-gray-500 mb-2">
                            現在の画像
                        </p>

                        <img src="{{ asset($species->image_path) }}"
                            alt="{{ $species->name }}"
                            class="
                                w-full
                                h-64
                                object-contain
                                bg-white
                                border
                                rounded-xl
                            "
                        >

                    </div>

                </div>

                {{-- 右側 --}}
                <div>

                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            説明
                        </label>

                        <textarea
                          name="description"
                          rows="17"
                          class="w-full border rounded-xl px-4 py-3"
                        >{{ old('description', $species->description) }}</textarea>

                    </div>

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
                                h-64
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

                                <span class="text-4xl">
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
                    flex
                    justify-end
                    gap-4
                    mt-8
                "
            >

                <a href="{{ route('admin.species.index') }}"
                    class="
                        px-10
                        py-4
                        border
                        border-red-300
                        bg-red-50
                        rounded-xl
                        text-red-500
                        hover:bg-red-100
                        font-semibold
                    "
                >
                    キャンセル
                </a>

                <button
                    type="submit"
                    class="
                        px-10
                        py-4
                        bg-blue-600
                        text-white
                        rounded-xl
                        hover:bg-blue-700
                        font-semibold
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

});

</script>

@endsection