<x-guest-layout>

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-sky-900">
            担当者申請
        </h2>
    </div>

    <form method="POST" action="{{ route('staff.request.store') }}">

        @csrf

        {{-- 氏名 --}}
        <div class="mb-4">
            <x-input-label for="name" value="氏名" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="block mt-1 w-full"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- メールアドレス --}}
        <div class="mb-4">
            <x-input-label for="email" value="メールアドレス" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="block mt-1 w-full"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- パスワード --}}
        <div class="mb-4">
            <x-input-label for="password" value="パスワード" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="block mt-1 w-full"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- 所属水族館 --}}
        <div class="mb-4">
            <x-input-label for="aquarium_name" value="所属水族館" />

            <select
                id="aquarium_name"
                name="aquarium_name"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">水族館を選択してください</option>

                @foreach ($aquariums as $aquarium)
                    <option
                        value="{{ $aquarium->name }}"
                        @selected(old('aquarium_name') === $aquarium->name)
                    >
                        {{ $aquarium->name }}
                    </option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('aquarium_name')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button>
                申請する
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>