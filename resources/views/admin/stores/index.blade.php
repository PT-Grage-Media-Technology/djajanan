@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto py-4 mb-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Toko
            </h2>

            {{-- ini cards --}}
            <div class="container-profile ">
                @forelse($stores as $store)
                    <div class="card-profile">
                        <p><strong>ID:</strong> {{ $store->id_toko }}</p>
                        <form action="/detailed-store" method="GET">
                            <input type="hidden" value="{{ $store->id_toko }}" name="id">
                            <img src="https://djajanan.com/store_image/{{ $store->foto_profile_toko ? $store->foto_profile_toko : 'markets.png' }}"
                                alt="Profile Picture" loading="lazy">
                            {{-- <h2>{{ $store->nama_toko }}</h2> --}}
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://djajanan.com/store_image/{{ $store->foto_profile_toko ? $store->foto_profile_toko : 'markets.png' }}"
                                        alt="{{ $store->nama_toko }}" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit">
                                        <p class="font-semibold">{{ $store->nama_toko }}</p>
                                    </button>
                                </div>
                        </form>
                    </div>

                    <div class="info">
                        <strong>Seller_id:</strong> {{ $store->id_seller }}
                    </div>
                    <div class="info">
                        {{ $store->created_at->format('d/m/Y') }}
                    </div>
                    <div class="info">
                        {{ $store->alamat_toko }}
                    </div>
                    <button id="dropdownButton1" class="dropdown-button dark:text-white">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 8.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8 4.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8 12.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                        </svg>
                    </button>
                    <div id="dropdown1" class="dropdown-menu">
                        <ul>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menu</a>
                                <form method="POST" action="/admin/stores/destroy/{{ $store->id_toko }}"
                                    onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <span class="text-red-600 font-bold">Delete</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
            </div>
        @empty
            <p>No stores found.</p>
            @endforelse
            <div class="flex items-center md:hidden justify-center px-4 mb-10">
                <nav class="flex items-center gap-x-2" aria-label="Pagination">
                    <!-- Previous Page -->
                    @if ($currentPage > 1)
                        <a href="?page={{ $currentPage - 1 }}"
                            class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
                            aria-label="Previous">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </a>
                    @else
                        <span
                            class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
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
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
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


        <div class="user-table w-full overflow-hidden rounded-lg shadow-xs">
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID Toko</th>
                                <th class="px-4 py-3">Nama Toko</th>
                                {{-- <th class="px-4 py-3">Id Seller</th> --}}
                                <th class="px-4 py-3">Alamat Toko</th>
                                <th class="px-4 py-3">Tanggal Join</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($stores as $store)
                                <form action="/detailed-store" method="GET">
                                    <input type="hidden" value="{{ $store->id_toko }}" name="id">


                                    <tr class="text-gray-700 dark:text-gray-400">
                                        {{-- ID Toko --}}
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $store->id_toko }}</p>
                                                </div>
                                            </div>
                                        </td>


                                        {{-- Nama Toko --}}
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://djajanan.com/store_image/{{ $store->foto_profile_toko ? $store->foto_profile_toko : 'markets.png' }}"
                                                        alt="{{ $store->nama_toko }}" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit">
                                                        <p class="font-semibold">{{ $store->nama_toko }}</p>
                                                    </button>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $store->id_seller }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                </form>
                                {{-- Alamat Toko --}}
                                <td class="px-4 py-3 text-sm">
                                    {{ $store->alamat_toko }}
                                </td>

                                {{-- Tanggal Join --}}
                                <td class="px-4 py-3 text-sm">
                                    {{ $store->created_at->format('d/m/Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        {{-- INI DI HAPUS KARENA ADMIN TIDAK PUNYA AKSES UNTUK MENGEDIT TOKO --}}
                                        {{-- <a href="{{ route('admin.stores.edit', $store) }}" --}} {{-- <a
                                            href="/admin/stores/edit/{{ $store->id_toko }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a> --}}
                                        <form method="POST" action="/admin/stores/destroy/{{ $store->id_toko }}"
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
                <script>
                    function confirmDelete() {
                        return confirm('Are you sure you want to delete this item?');
                    }
                </script>
            </div>
    </main>
@endsection
