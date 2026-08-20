 <aside class="w-80 bg-gradient-to-b from-sky-400 to-blue-600 text-white shadow-xl">

        <div class="py-8 flex flex-col items-center border-b border-sky-300">

     <img
        src="{{ asset('images/logo.png') }}"
        alt="ロゴ"
        class="w-24 h-24 bg-white rounded-full p-2 shadow-md"
    >

    <h2 class="text-2xl font-bold mt-4">
        Aquarium Community
    </h2>

    <p class="mt-2 text-sm text-sky-100">
        管理メニュー
    </p>

</div>

        <nav class="p-4 space-y-3">

           <a href="{{ route('staff.dashboard') }}"
   class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold bg-sky-500 hover:bg-sky-400 transition">

    <img
        src="{{ asset('images/icons/dashboard.png') }}"
        alt="ダッシュボード"
        class="w-12 h-12"
    >

    <span>ダッシュボード</span>

</a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                <img
                    src="{{ asset('images/icons/area-manage.png') }}"
                    alt="展示エリア管理"
                    class="w-12 h-12"
                >
                <span>展示エリア管理</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                <img
                    src="{{ asset('images/icons/species-manage.png') }}"
                    alt="生き物管理"
                    class="w-12 h-12"
                >
                <span>生き物管理</span>
            </a>

            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
            >
                <img
                    src="{{ asset('images/icons/sidebar-mypage.png') }}"
                    alt="プロフィール"
                    class="w-12 h-12"
                >
                <span>プロフィール</span>
            </a>
            <a href="{{ route('home') }}"
             class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
              >
             <img
                    src="{{ asset('images/icons/sidebar-home.png') }}"
                    alt="ユーザー画面へ"
                    class="w-12 h-12"
                >
                <span>ユーザー画面へ</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="flex items-center gap-3 rounded-xl px-5 py-4 text-lg font-semibold hover:bg-sky-500 transition"
                >
                    <img
                        src="{{ asset('images/icons/logout.png') }}"
                        alt="ログアウト"
                        class="w-12 h-12"
                    >
                    <span>ログアウト</span>
                </button>
            </form>

        </nav>

    </aside>