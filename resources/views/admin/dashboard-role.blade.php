@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto py-4 mb-8">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Toko
            </h2>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">ID User</th>
                                    <th class="px-4 py-3">Alamat User</th>
                                    <th class="px-4 py-3">No Telp</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Role Requested</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($roleRequests->sortByDesc('id') as $request)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <!-- ID User -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $request->user->name }}</p>
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
                                                    <p class="font-semibold">{{ $request->user->address }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- No Telp -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->user->phone_number }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Email -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Role Requested -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $request->requested_role }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <h5 class="approved {{ $request->status !== 'approved' ? 'hidden' : '' }} items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border border-green-600 text-green-600 dark:text-white">
                                                    Approved
                                                </h5>
                                                <h5 class="rejected {{ $request->status !== 'rejected' ? 'hidden' : '' }} items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border border-red-600 text-red-600 dark:text-white">
                                                    Canceled
                                                </h5>

                                                <form action="{{ route('role-request.approve', $request->user->id) }}"
                                                {{-- <form action="/role-request/approve/{{ $request->user->id }}" --}}
                                                    method="POST" style="display: inline;">
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

                                                <form action="{{ route('role-request.cancel', $request->user->id) }}"
                                                {{-- <form action="/role-request/cancel/{{ $request->user->id }}" --}}
                                                    method="POST" style="display: inline;">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3">
                            Showing 21-30 of 100
                        </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                <ul class="inline-flex items-center">
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                    <!-- Pagination numbers -->
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                                    </li>
                                    <li>
                                        <span class="px-3 py-1">...</span>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </span>
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
