<!-- 下部ナビ -->
    <div class="fixed bottom-0 left-1/2 -translate-x-1/2 max-w-md w-full bg-white border-t h-20 flex justify-around pt-2 shadow">
        <a href="{{  route('home') }}"
          class="{{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-500' }} text-center">
            <img src="{{ asset('images/icons/home.png') }}" alt="ホーム" class="w-6 h-6 mx-auto">
            <div class="text-[11px] mt-1">
              ホーム
            </div>
        </a>

        <a href="{{ route('aquariums.index') }}" class="{{ request()->routeIs('aquariums.*', 'areas.*') ? 'text-blue-600' : 'text-gray-500' }} text-center">
            <img src="{{ asset('images/icons/aquarium.png') }}" alt="水族館" class="w-6 h-6 mx-auto">
            <div class="text-[11px] mt-1">
             水族館
            </div>
        </a>

        <a href="{{ route('species.index') }}" class="{{ request()->routeIs('species.*', 'species.aquariums') ? 'text-blue-600' : 'text-gray-500' }}">
            <img src="{{ asset('images/icons/encyclopedia.png') }}"alt="図鑑"class="w-6 h-6 mx-auto">
             <div class="text-[11px] mt-1">
               図鑑
             </div>
        </a>

        <a href="{{ route('posts.index') }}" class="{{ request()->routeIs('posts.*') ? 'text-blue-600' : 'text-gray-500' }} text-center">
            <img src="{{ asset('images/icons/post.png') }}"alt="投稿"class="w-6 h-6 mx-auto">
            <div class="text-[11px] mt-1">
                投稿
            </div>
        </a>

        <a href="{{ route('mypage') }}" class="{{ request()->routeIs('mypage', 'mypage.*') ? 'text-blue-600' : 'text-gray-500' }} text-center">
            <img src="{{ asset('images/icons/mypage.png') }}" alt="マイページ" class="w-6 h-6 mx-auto">
            <div class="text-[11px] mt-1">
                マイページ
            </div>
        </a>
    </div>