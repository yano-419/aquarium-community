<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-sky-900">
            システム管理者ログイン
        </h2>
    </div>
    <div class="flex items-center justify-center my-6">

    <div class="flex-1 h-px bg-sky-200"></div>

    <span class="mx-4 text-2xl">
        ⚙️
    </span>

    <div class="flex-1 h-px bg-sky-200"></div>

</div>
    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="メールアドレス" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="パスワード" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full flex justify-center py-3">
                ログイン
            </x-primary-button>
        </div>

        <div class="mt-8 text-center">

            <a href="{{ route('select.login') }}"
               class="block w-full border border-gray-300 rounded-lg py-3 text-center text-gray-700 font-semibold">
                ログイン選択画面へ戻る
            </a>

        </div>

    </form>
</x-guest-layout>