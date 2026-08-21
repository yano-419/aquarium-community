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

        <!-- ダッシュボード -->
        <a
            href="{{ route('staff.dashboard') }}"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('staff.dashboard')
                    ? 'bg-sky-500'
                    : 'hover:bg-sky-500'
                }}
            "
        >
             <img
                src="{{ asset('images/icons/dashboard.png') }}"
                alt="ダッシュボード"
                class="w-8 h-8"
            >

            <span>ダッシュボード</span>
        </a>

        <!-- 展示エリア管理 -->
        <a
            href="{{ route('staff.areas.index') }}"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('staff.areas.*')
                    ? 'bg-sky-500'
                    : 'hover:bg-sky-500'
                }}
            "
        >
            <img
                src="{{ asset('images/icons/area-manage.png') }}"
                alt="展示エリア管理"
                class="w-8 h-8"
            >

            <span>展示エリア管理</span>
        </a>

        <!-- 生き物管理 -->
        <a
            href="#"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('staff.species.*')
                    ? 'bg-sky-500'
                    : 'hover:bg-sky-500'
                }}
            "
        >
            <img
                src="{{ asset('images/icons/species-manage.png') }}"
                alt="生き物管理"
                class="w-8 h-8"
            >

            <span>生き物管理</span>
        </a>

        <!-- プロフィール -->
        <a
            href="#"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('profile.*')
                    ? 'bg-sky-500'
                    : 'hover:bg-sky-500'
                }}
            "
        >
            <img
                src="{{ asset('images/icons/sidebar-mypage.png') }}"
                alt="プロフィール"
                class="w-8 h-8"
            >

            <span>プロフィール</span>
        </a>

        <!-- ユーザー画面 -->
        <a
            href="{{ route('home') }}"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                hover:bg-sky-500
            "
        >
             <img  
                src="{{ asset('images/icons/sidebar-home.png') }}"
                alt="ユーザー画面"
                class="w-8 h-8"
            >

            <span>ユーザー画面</span>
        </a>

        <!-- ログアウト -->
        <a
            href="{{ route('logout') }}"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                hover:bg-sky-500
            "
        >
            <img
                src="{{ asset('images/icons/logout.png') }}"
                alt="ログアウト"
                class="w-8 h-8"
            >

            <span>ログアウト</span>
        </a>
    </nav>

</aside>
            
          