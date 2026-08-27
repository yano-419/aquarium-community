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
            システム管理メニュー
        </p>

    </div>

    <nav class="p-4 space-y-3">

        <!-- ダッシュボード -->
        <a
            href="{{ route('admin.dashboard') }}"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('admin.dashboard')
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

        <!-- 水族館管理 -->
        <a
            href="#"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                {{ request()->routeIs('staff.areas.*')
                    ? 'bg-sky-500'
                    : 'hover:bg-sky-500'
                }}
            "
        >
            <img
                src="{{ asset('images/icons/aquarium-manage.png') }}"
                alt="水族館管理"
                class="w-8 h-8"
            >

            <span>水族館管理</span>
        </a>

        <!-- 担当者管理 -->
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
                src="{{ asset('images/icons/staff-manage.png') }}"
                alt="担当者管理"
                class="w-8 h-8"
            >

            <span>担当者管理</span>
        </a>

        <!-- 図鑑管理 -->
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
                src="{{ asset('images/icons/encyclopedia-manage.png') }}"
                alt="図鑑"
                class="w-8 h-8"
            >

            <span>図鑑管理</span>
        </a>

        <!-- 未登録生物管理 -->
        <a
            href="#"
            class="
                flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
                hover:bg-sky-500
            "
        >
             <img  
                src="{{ asset('images/icons/unregistered-species.png') }}"
                alt="未登録生物管理"
                class="w-8 h-8"
            >

            <span>未登録生物管理</span>
          </a>

          <!-- 投稿管理 -->
        <a 
           href="#"
           class=" flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
           hover:bg-sky-500 "
          >  

    <img src="{{ asset('images/icons/post-manage.png') }}"        
        alt="投稿管理"
        class="w-8 h-8"
       >

    <span>投稿管理</span>
         </a>

           <!-- プロフィール -->
        <a 
           href="{{ route('profile.edit') }}"
           class=" flex items-center gap-3 px-5 py-4 rounded-xl text-lg font-semibold transition
           hover:bg-sky-500 "
          >  

    <img src="{{ asset('images/icons/sidebar-mypage.png') }}"        
        alt="プロフィール"
        class="w-8 h-8"
       >

    <span>プロフィール</span>
         </a>

        <!-- ログアウト -->
    <form action="{{ route('logout') }}" method="POST">
    @csrf

    <button
        type="submit"
        class="
            w-full
            flex
            items-center
            gap-3
            px-5
            py-4
            rounded-xl
            text-lg
            font-semibold
            transition
            hover:bg-sky-500
        "
    >
       <img
            src="{{ asset('images/icons/logout.png') }}"
            alt="ログアウト"
            class="w-8 h-8"
        >

        <span>
            ログアウト
        </span>

    </button>
</form>
    </nav>

</aside>
            
          