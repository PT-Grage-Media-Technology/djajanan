@extends('admin.layouts.main-admin')
@section('container-admin')
<main class="h-screen overflow-y-auto">
    <div class="container px-6 mx-auto grid py-4 mb-8 max-w-4xl">
        <!-- FormTitle -->
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 text-center">Create New User</h2>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <!-- Error Notifications -->
            @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 dark:bg-red-200 text-red-800 dark:text-red-900 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Create User Form -->
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            {{-- <form action="/admin/users" method="POST" class="space-y-4"> --}}
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" name="name" id="name" placeholder="write a name..." class="mt-1 block w-full sm:w-10/12 md:w-9/12 lg:w-8/12 mx-auto border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}">
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="write a phone number..." class="mt-1 block w-full sm:w-10/12 md:w-9/12 lg:w-8/12 mx-auto border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('phone') }}">
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" id="email" placeholder="write an email..." class="mt-1 block w-full sm:w-10/12 md:w-9/12 lg:w-8/12 mx-auto border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input type="password" name="password" id="password" placeholder="**********" class="mt-1 block w-full sm:w-10/12 md:w-9/12 lg:w-8/12 mx-auto border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                    Create User
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;

    themeToggle.addEventListener('click', () => {
        if (htmlElement.classList.contains('dark')) {
            htmlElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            htmlElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });

    // On page load, set the theme based on localStorage
    if (localStorage.getItem('theme') === 'dark') {
        htmlElement.classList.add('dark');
    }
</script>

@endsection
