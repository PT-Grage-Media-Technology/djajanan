@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen overflow-y-auto">
        <div class="container px-6 mx-auto grid overflow-y-hidden py-4 mb-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Admin History
            </h2>

            <!-- Notifications -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Action</th>
                                <th class="px-4 py-3">Model</th>
                                <th class="px-4 py-3">Role</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($histories as $history)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"> {{ $history->admin->name }}</td>
                                    <td class="px-4 py-3 text-sm"> {{ $history->admin->email }}</td>
                                    <td class="px-4 py-3 text-sm"> {{ $history->action }}</td>
                                    <td class="px-4 py-3 text-sm"> {{ $history->affected_model }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($history->admin->hasRole('seller'))
                                            seller
                                        @elseif ($history->admin->hasRole('admin'))
                                            admin
                                        @else
                                            buyer
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm"> {{ $history->created_at->format('Y-m-d H:i:s') }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex items-center justify-center px-4 mb-10">
                        <nav class="flex items-center gap-x-2" aria-label="Pagination">
                            <!-- Previous Page -->
                            @if ($currentPage > 1)
                                <a href="?page={{ $currentPage - 1 }}"
                                    class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
                                    aria-label="Previous">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </a>
                            @else
                                <span
                                    class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            @endif

                            <!-- Page Buttons -->
                            <div class="flex items-center gap-x-2">
                                @for ($i = 1; $i <= $lastPage; $i++)
                                    <a href="?page={{ $i }}"
                                        class="min-h-[38px] min-w-[38px] flex justify-center items-center border text-sm py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500
                                       @if ($i == $currentPage) bg-teal-600 text-white border-teal-600 @else border-gray-300 text-gray-800 hover:bg-gray-100 dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10 @endif">
                                        {{ $i }}
                                    </a>
                                @endfor
                            </div>

                            <!-- Next Page -->
                            @if ($currentPage < $lastPage)
                                <a href="?page={{ $currentPage + 1 }}"
                                    class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
                                    aria-label="Next">
                                    <span class="sr-only">Next</span>
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            @else
                                <span
                                    class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                    <span class="sr-only">Next</span>
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </span>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{--
    <div class="mt-4">
        {{ $histories->links('pagination::tailwind') }}
    </div> --}}
@endsection
