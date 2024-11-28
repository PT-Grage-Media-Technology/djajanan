@extends('admin.layouts.main-admin')
@section('container-admin')
<main class="h-screen overflow-y-auto">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden pl-10 shadow-sm sm:rounded-lg p-6">
                @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="py-2 bg-red-500 dark:bg-red-700 text-white font-bold">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data"> --}}
                <form method="POST" action="/admin/pengiriman/store2" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nomor Jasa Pengiriman</label>
                        <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
