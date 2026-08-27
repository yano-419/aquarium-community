@extends('layouts.admin')

@section('title', '管理者ダッシュボード')

@section('header-title', '管理者ダッシュボード')

@section('content')

<div class="p-10">

    <div class="grid md:grid-cols-3 gap-12 max-w-7xl mx-auto mb-12">

       <div class="bg-white rounded-3xl shadow-lg p-14 text-center">

       <div class="w-30 h-30 mx-auto mb-6">
                   <img
                        src="{{ asset('images/icons/aquarium-icon.png') }}"
                        alt="Area Icon"
                        class="w-full h-full object-contain"
                    >
      </div>
         <h3 class="text-blue-600 font-bold text-2xl">
            登録水族館数
         </h3>

         <p class="text-8xl font-bold mt-6">
           {{ $aquariumsCount }}
         </p>

         <p class="text-gray-500 mt-2">
           館
         </p>

       </div>

        <div class="bg-white rounded-3xl shadow-lg p-14 text-center">
            <div class="w-30 h-30 mx-auto mb-6">
                   <img
                        src="{{ asset('images/icons/admin-staff-icon.png') }}"
                        alt="Area Icon"
                        class="w-full h-full object-contain"
                    >
            </div>
           <h3 class="text-green-600 font-bold text-2xl">
             担当者数
           </h3>

           <p class="text-8xl font-bold mt-6">
             {{ $staffCount }}
           </p>

           <p class="text-gray-500 mt-2">
             人
           </p>

       </div>

       <div class="bg-white rounded-3xl shadow-lg p-14 text-center">
           <div class="w-30 h-30 mx-auto mb-6">
                   <img
                        src="{{ asset('images/icons/member-icon.png') }}"
                        alt="Area Icon"
                        class="w-full h-full object-contain"
                    >
          </div>
         <h3 class="text-cyan-600 font-bold text-2xl">
             会員数
         </h3>

         <p class="text-8xl font-bold mt-6">
            {{ $memberCount }}
         </p>

         <p class="text-gray-500 mt-2">
            人
         </p>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-6">

        <a href="#"
            class="
                bg-blue-50
                border
                border-blue-100
                rounded-3xl
                shadow-lg
                p-8
                hover:bg-blue-100
                transition
            "
        >
            <h3 class="text-2xl font-bold text-blue-700">
                水族館管理
            </h3>
        </a>

        <a href="#"
            class="
                bg-green-50
                border
                border-green-100
                rounded-3xl
                shadow-lg
                p-8
                hover:bg-green-100
                transition
            "
        >
            <h3 class="text-2xl font-bold text-green-700">
                担当者管理
            </h3>
        </a>

        <a href="#"
            class="
                bg-orange-50
                border
                border-orange-100
                rounded-3xl
                shadow-lg
                p-8
                hover:bg-orange-100
                transition
            "
        >
            <h3 class="text-2xl font-bold text-orange-700">
                図鑑管理
            </h3>
        </a>

        <a href="#"
            class="
                bg-purple-50
                border
                border-purple-100
                rounded-3xl
                shadow-lg
                p-8
                hover:bg-purple-100
                transition
            "
        >
            <h3 class="text-2xl font-bold text-purple-700">
                未登録生物管理
            </h3>
        </a>

    </div>

</div>

@endsection