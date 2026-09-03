@extends('layouts.admin')

@section('title', '図鑑へ登録')

@section('header-title', '未登録生物管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-12">

        <h2 class="text-3xl font-bold text-blue-700 mb-8">
            図鑑へ登録
        </h2>

        <form action="{{ route('admin.species.unregistered.store', $aquariumSpecies->id) }}"
            method="POST"
        >
            @csrf

            <div class="grid grid-cols-2 gap-12">

                <div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            生き物名
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $aquariumSpecies->name) }}"
                            class="w-full border rounded-xl px-5 py-4"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            学名
                        </label>

                        <input
                            type="text"
                            name="scientific_name"
                            value="{{ old('scientific_name', $aquariumSpecies->scientific_name) }}"
                            class="w-full border rounded-xl px-5 py-4"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            分類
                        </label>

                        <input
                            type="text"
                            name="classification"
                            value="{{ old('classification', $aquariumSpecies->classification) }}"
                            class="w-full border rounded-xl px-5 py-4"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            目
                        </label>

                        <input
                            type="text"
                            name="order_name"
                            value="{{ old('order_name', $aquariumSpecies->order_name) }}"
                            class="w-full border rounded-xl px-5 py-4"
                        >

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            科
                        </label>

                        <input
                            type="text"
                            name="family_name"
                            value="{{ old('family_name', $aquariumSpecies->family_name) }}"
                            class="w-full border rounded-xl px-5 py-4"
                        >

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        現在の画像
                    </label>

                    <img src="{{ asset($aquariumSpecies->image_path) }}"
                        alt="{{ $aquariumSpecies->name }}"
                        class="
                            w-full
                            h-64
                            object-contain
                            bg-white
                            border
                            rounded-xl
                        "
                    >

                    <div class="mt-6">

                        <label class="block font-bold mb-2">
                            説明
                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            class="w-full border rounded-xl px-5 py-4"
                        >{{ old('description', $aquariumSpecies->description) }}</textarea>

                    </div>

                </div>

            </div>

            <div class="flex justify-end gap-4 mt-10">

                <a href="{{ route('admin.unregistered-species.index') }}"
                    class="
                        px-10 py-4
                        bg-red-50
                        border
                        border-red-300
                        text-red-500
                        rounded-xl
                    "
                >
                    キャンセル
                </a>

                <button
                    type="submit"
                    class="
                        px-10 py-4
                        bg-blue-600
                        text-white
                        rounded-xl
                    "
                >
                    図鑑へ登録
                </button>

            </div>

        </form>

    </div>

</div>

@endsection