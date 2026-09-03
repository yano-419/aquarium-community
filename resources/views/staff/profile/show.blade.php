@extends('layouts.staff')

@section('title', 'プロフィール')

@section('content')

<div class="p-10">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <h2 class="text-3xl font-bold text-blue-700 mb-8">
            プロフィール
        </h2>

        <div class="space-y-6">

            <div>

                <label class="font-bold">
                    氏名
                </label>

                <div class="mt-2 border rounded-xl p-4 bg-gray-50">
                    {{ $user->name }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    メールアドレス
                </label>

                <div class="mt-2 border rounded-xl p-4 bg-gray-50">
                    {{ $user->email }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    役割
                </label>

                <div class="mt-2 border rounded-xl p-4 bg-gray-50">
                    水族館担当者
                </div>

            </div>

            <div>

                <label class="font-bold">
                    所属水族館
                </label>

                <div class="mt-2 border rounded-xl p-4 bg-gray-50">
                    {{ $staff?->aquarium?->name }}
                </div>

            </div>

            <div>

                <label class="font-bold">
                    登録日
                </label>

                <div class="mt-2 border rounded-xl p-4 bg-gray-50">
                    {{ $user->created_at->format('Y/m/d') }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection