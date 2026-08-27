@extends('layouts.admin')

@section('title', '担当者登録')

@section('header-title', '担当者管理')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <form action="{{ route('admin.staff.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-10">

                {{-- 左側 --}}
                <div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            氏名
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            担当する水族館
                        </label>

                        <select
                            name="aquarium_id"
                            class="w-full border rounded-xl px-4 py-3"
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

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            パスワード
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                </div>

                {{-- 右側 --}}
                <div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            メールアドレス
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            役割
                        </label>

                        <select
                            name="role"
                            class="w-full border rounded-xl px-4 py-3"
                        >
                            <option value="staff">
                                水族館担当者
                            </option>
                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="block font-bold mb-2">
                            確認用パスワード
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                </div>

            </div>

            <div class="mt-6">

                <label class="block font-bold mb-2">
                    備考
                </label>

                <textarea
                    name="memo"
                    rows="4"
                    class="w-full border rounded-xl px-4 py-3"
                ></textarea>

            </div>

            <div
                class="
                    flex
                    justify-end
                    gap-4
                    mt-10
                "
            >

                <a href="{{ route('admin.staff.index') }}"
                    class="
                        px-12
                        py-4
                        border
                        border-red-300
                        bg-red-50
                        rounded-xl
                        text-red-500
                        hover:bg-red-100
                    "
                >
                    キャンセル
                </a>

                <button
                    type="submit"
                    class="
                        px-12
                        py-4
                        bg-blue-600
                        text-white
                        rounded-xl
                        hover:bg-blue-700
                    "
                >
                    登録
                </button>

            </div>

        </form>

    </div>

</div>

@endsection