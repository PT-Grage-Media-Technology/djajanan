@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen overflow-y-auto py-4">
        <div class="container px-6 mx-auto grid overflow-y-hidden py-4 mb-8">

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Category
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

            <!-- Add Category Button -->
            <div class="mb-4 flex justify-start">
                <a href="/admin/categories/create"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg dark:bg-gray-700 dark:text-white">
                    Add Category
                </a>
            </div>

            <!-- New Table -->
             <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID Category</th>
                                <th class="px-4 py-3">Nama Category</th>
                                <th class="px-4 py-3">Foto</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($categories as $category)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">{{ $category->id }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $category->name }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://djajanan.com/{{ $category->icon}}" alt="{{ $category->name }}"
                                                    loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a href="/admin/categories/edit/{{ $category->id }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="/admin/categories/destroy/{{ $category->id }}"
                                                onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex items-center justify-center px-4 mb-10">
                        <nav class="flex items-center gap-x-2" aria-label="Pagination">
                            <!-- Previous Page -->
                            @if ($currentPage > 1)
                                <a href="?page={{ $currentPage - 1 }}" class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" aria-label="Previous">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </a>
                            @else
                                <span class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                                <a href="?page={{ $currentPage + 1 }}" class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" aria-label="Next">
                                    <span class="sr-only">Next</span>
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            @else
                                <span class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                    <span class="sr-only">Next</span>
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </span>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmDelete() {
                return confirm('Are you sure you want to delete this category? This action cannot be undone.');
            }
        </script>
    </main>
@endsection
