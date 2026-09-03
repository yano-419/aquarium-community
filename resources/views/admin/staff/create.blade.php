@extends('layouts.admin')

@section('title', '担当者登録')

@section('header-title', '担当者管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-12">

    @if ($errors->any())

    <div class="mb-6 p-4 bg-red-100 text-red-600 rounded-xl">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
        <form action="{{ route('admin.staff.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-12">

                {{-- 左側 --}}
                <div>

                    <div class="mb-8">

                        <label class="block font-bold mb-2 text-lg">
                            氏名
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div class="mb-8">

                        <label class="block font-bold mb-2 text-lg">
                            担当する水族館
                        </label>

                        <select
                            name="aquarium_id"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                            <option value="">
                                選択してください
                            </option>

                            @foreach($aquariums as $aquarium)

                                <option
                                    value="{{ $aquarium->id }}"
                                >
                                    {{ $aquarium->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-8">

                        <label class="block font-bold mb-2 text-lg">
                            パスワード
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div>

                        <label class="block font-bold mb-2 text-lg">
                            確認用パスワード
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                </div>

                {{-- 右側 --}}
                <div>

                    <div class="mb-8">

                        <label class="block font-bold mb-2 text-lg">
                            メールアドレス
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >

                    </div>

                    <div class="mb-8">

                        <label class="block font-bold mb-2 text-lg">
                            役割
                        </label>

                        <select
                            name="role"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        >
                            <option value="staff">
                                水族館担当者
                            </option>
                        </select>

                    </div>

                    <div>

                        <label class="block font-bold mb-2 text-lg">
                            備考
                        </label>

                        <textarea
                            name="memo"
                            rows="7"
                            class="w-full border rounded-xl px-5 py-4 text-lg"
                        ></textarea>

                    </div>

                </div>

            </div>

            <div
                class="
                    flex
                    justify-end
                    gap-4
                    mt-12
                "
            >

                <a href="{{ route('admin.staff.index') }}"
                    class="
                        px-12
                        py-5
                        border
                        border-red-300
                        bg-red-50
                        rounded-xl
                        text-red-500
                        hover:bg-red-100
                        text-lg
                        font-semibold
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
                        hover:bg-blue-700
                        text-lg
                        font-semibold
                    "
                >
                    登録
                </button>

            </div>

        </form>

    </div>

</div>

@endsection