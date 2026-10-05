        @extends('layouts.admin')

        @section('title', '担当者申請')

        @section('header-title', '担当者申請')

        @section('content')

        <main class="p-5 md:p-10">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-800" role="alert">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="overflow-hidden rounded-3xl bg-white shadow-lg">
                <div class="flex flex-col gap-4 border-b border-slate-100 px-6 py-6 sm:flex-row sm:items-center sm:justify-between md:px-8">
                    <div>
                        <h2 class="text-2xl font-bold text-blue-700 md:text-3xl">
                            承認待ちの担当者申請
                        </h2>
                        <p class="mt-2 text-sm text-slate-500">
                            申請内容を確認して担当者登録を承認します。
                        </p>
                    </div>

                    <div class="flex items-center gap-3 self-start rounded-xl bg-sky-50 px-5 py-3 sm:self-auto">
                        <span class="text-sm font-semibold text-sky-800">承認待ち</span>
                        <span class="text-2xl font-bold text-sky-700">{{ $requests->count() }}</span>
                        <span class="text-sm text-sky-800">件</span>
                    </div>
                </div>

                @if ($requests->isEmpty())
                    <div class="px-6 py-16 text-center md:px-8">
                        <p class="text-lg font-semibold text-slate-700">
                            現在、承認待ちの申請はありません。
                        </p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[760px]">
                            <thead class="bg-slate-50 text-sm text-slate-600">
                                <tr class="border-b border-slate-200">
                                    <th scope="col" class="px-6 py-4 text-left font-semibold">申請者</th>
                                    <th scope="col" class="px-6 py-4 text-left font-semibold">所属水族館</th>
                                    <th scope="col" class="px-6 py-4 text-left font-semibold">申請日</th>
                                    <th scope="col" class="px-6 py-4 text-center font-semibold">状態</th>
                                    <th scope="col" class="px-6 py-4 text-center font-semibold">操作</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($requests as $staffRequest)
                                    <tr class="hover:bg-sky-50/50">
                                        <td class="px-6 py-5">
                                            <p class="font-bold text-slate-800">{{ $staffRequest->name }}</p>
                                            <a href="mailto:{{ $staffRequest->email }}" class="mt-1 inline-block text-sm text-slate-500 hover:text-blue-700">
                                                {{ $staffRequest->email }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-5 font-semibold text-slate-700">
                                            {{ $staffRequest->aquarium_name }}
                                        </td>
                                        <td class="px-6 py-5 text-sm text-slate-600">
                                            {{ $staffRequest->created_at?->format('Y/m/d H:i') ?? '-' }}
                                        </td>
                                        <td class="px-6 py-5 text-center">
                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-800">
                                                承認待ち
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 text-center">
                                            <form method="POST" action="{{ route('admin.staff.requests.approve', $staffRequest->id) }}">
                                                @csrf
                                                <button
                                                    type="submit"
                                                    class="rounded-xl bg-blue-600 px-5 py-2.5 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                                >
                                                    承認
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>
        </main>

        @endsection