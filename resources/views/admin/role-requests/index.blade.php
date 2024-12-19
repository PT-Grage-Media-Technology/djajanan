@extends('admin.layouts.main-admin')

@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto py-4 mb-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Role Requests
            </h2>

            {{-- ini cards --}}
            <div class="container-profile">

                @forelse ($roleRequests->sortByDesc('id') as $request)
                    <div class="card-profile">
                        <p><strong>ID:</strong>{{ $request->user_id }}</p>
                        <img src="https://djajanan.com/{{ $request->img ? $request->img : 'img/client-1.png' }}"
                            alt="Profile Picture" loading="lazy">
                        <h2>{{ $request->name }}</h2>
                        <div class="info">
                            <p><strong>No Telp</strong> {{ $request->phone }}</p>
                            <p><strong>Email:</strong> {{ $request->email }}</p>
                            <p><strong>Alamat</strong> {{ $request->location }}</p>
                        </div>
                        <div class="btn-container">
                            <h5 id="approved-status"
                                class="approved items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border border-green-600 text-green-600 dark:text-white"
                                style="display: none;">
                                Approved
                            </h5>

                            {{-- <form action="{{ route('role-request.approve', $request->id) }}" method="POST" --}}
                            <form action="/role-request/approve/{{ $request->user_id }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <button
                                    class="check flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Check">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z">
                                        </path>
                                    </svg>
                                </button>
                            </form>

                            {{-- <form action="{{ route('role-request.cancel', $request->id) }}" method="POST" --}}
                            <form action="/role-request/cancel/{{ $request->user_id }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <button
                                    class="cancel flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z">
                                        </path>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                @empty
                    <p>No requests found.</p>
                @endforelse
                <div class="flex items-center justify-center px-4 mb-10">
                    <nav class="flex items-center gap-x-2" aria-label="Pagination">
                        <!-- Previous Page -->
                        @if ($currentPage > 1)
                            <a href="?page={{ $currentPage - 1 }}"
                                class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
                                aria-label="Previous">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </a>
                        @else
                            <span
                                class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
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
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        @else
                            <span
                                class="flex items-center justify-center min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-400 cursor-not-allowed">
                                <span class="sr-only">Next</span>
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </span>
                        @endif
                    </nav>
                </div>
            </div>


            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <!-- New Table -->
                <div class="user-table w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">ID User</th>
                                    <th class="px-4 py-3">Alamat User</th>
                                    <th class="px-4 py-3">No Telp</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($roleRequests as $request)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <!-- ID User -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div class="relative  w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://djajanan.com/{{ $request->img ? $request->img : 'img/client-1.png' }}"
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $request->name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        ID User: {{ $request->user_id }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Alamat -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->location }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- No Telp -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->phone }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Email -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                {{-- <form action="{{ route('role-request.approve', $request->id) }}" --}}
                                                <form action="/role-request/approve/{{ $request->user_id }}"
                                                    method="POST" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button
                                                        class="check flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Check">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="currentColor">
                                                            <path
                                                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>

                                                {{-- <form action="{{ route('role-request.cancel', $request->id) }}" --}}
                                                <form action="/role-request/cancel/{{ $request->user_id }}"
                                                    method="POST" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button
                                                        class="cancel flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Cancel">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="currentColor">
                                                            <path
                                                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
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
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua tombol check
            const checkButtons = document.querySelectorAll('.check');
            // Ambil semua tombol cancel
            const cancelButtons = document.querySelectorAll('.cancel');

            // Menangani klik pada tombol check
            checkButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = button.closest('tr');
                    const approvedText = row.querySelector('.approved');
                    const rejectedText = row.querySelector('.rejected');

                    // Sembunyikan tombol dan tampilkan teks 'Approved'
                    button.style.display = 'none';
                    row.querySelector('.cancel').style.display = 'none';
                    approvedText.classList.remove('hidden');
                    rejectedText.classList.add('hidden');
                });
            });

            // Menangani klik pada tombol cancel
            cancelButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = button.closest('tr');
                    const approvedText = row.querySelector('.approved');
                    const rejectedText = row.querySelector('.rejected');

                    // Sembunyikan tombol dan tampilkan teks 'Rejected'
                    button.style.display = 'none';
                    row.querySelector('.check').style.display = 'none';
                    rejectedText.classList.remove('hidden');
                    approvedText.classList.add('hidden');
                });
            });
        });
    </script>
@endsection
