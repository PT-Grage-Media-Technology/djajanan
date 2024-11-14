@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Toko
            </h2>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    {{-- <form method="POST" action="admin.stores.update', $store->id_toko) }}" enctype="multipart/form-data"> --}}
                    <form method="POST" action="/admin/stores/update/{{ $store->id_toko }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nama_toko" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Toko</label>
                                <input type="text" id="nama_toko" name="nama_toko" value="{{ old('nama_toko', $store->nama_toko) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @error('nama_toko')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="alamat_toko" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat Toko</label>
                                <input type="text" id="alamat_toko" name="alamat_toko" value="{{ old('alamat_toko', $store->alamat_toko) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @error('alamat_toko')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="foto_profile_toko" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto Profile Toko</label>
                                <input type="file" id="foto_profile_toko" name="foto_profile_toko" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('foto_profile_toko')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 dark:focus:ring-offset-gray-800">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
