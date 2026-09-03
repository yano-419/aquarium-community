@extends('layouts.admin')

@section('title', 'プロフィール')

@section('header-title', 'プロフィール')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <h2
            class="
                text-3xl
                font-bold
                text-blue-700
                mb-8
            "
        >
            プロフィール
        </h2>

        <div class="space-y-6">

            <div>

                <label class="font-bold">
                    氏名
                </label>

                <div
                    class="
                        mt-2
                        border
                        rounded-xl
                        p-4
                        bg-gray-50
                    "
                >
                    {{ $user->name }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    メールアドレス
                </label>

                <div
                    class="
                        mt-2
                        border
                        rounded-xl
                        p-4
                        bg-gray-50
                    "
                >
                    {{ $user->email }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    権限
                </label>

                <div
                    class="
                        mt-2
                        border
                        rounded-xl
                        p-4
                        bg-gray-50
                    "
                >
                    {{ $user->role }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    登録日
                </label>

                <div
                    class="
                        mt-2
                        border
                        rounded-xl
                        p-4
                        bg-gray-50
                    "
                >
                    {{ $user->created_at->format('Y/m/d') }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection