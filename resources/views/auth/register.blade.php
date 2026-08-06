<x-guest-layout>
  <div class="text-center mb-8">
    <h2 class="text-3xl font-bold text-sky-900">
      会員登録
    </h2>
  </div>

  <div class="flex items-center justify-center my-6">
    <div class="flex-1 h-px bg-sky-200"></div>

    <span class="mx-4 text-2xl">
      🐟
    </span>

    <div class="flex-1 h-px bg-sky-200"></div>
  </div>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" value="ユーザー名" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" value="メールアドレス" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" value="パスワード" />

      <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" value="パスワード確認" />
      <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="mt-6">
      <x-primary-button class="w-full flex justify-center py-3">
        登録
      </x-primary-button>
    </div>

    <div class="mt-6">
      <div class="mt-8 text-center">
        <p class="text-gray-500 mb-4">
          または
        </p>

        <a href="{{ route('login') }}"
           class="flex items-center justify-center gap-2 w-full border border-blue-500 rounded-lg py-3 text-blue-600 font-semibold">
          ログインはこちら
        </a>
      </div>
    </div>
  </form>
</x-guest-layout>
