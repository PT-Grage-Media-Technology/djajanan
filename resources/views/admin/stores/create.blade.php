@extends('admin.layouts.main-admin')

@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Toko
            </h2>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <form action="{{ route('admin.stores.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- <form action="/admin/stores" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="grid grid-cols-1 gap-6 p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                            <!-- ID Seller -->
                            <div>
                                <label for="id_seller" class="text-sm font-semibold text-gray-700 dark:text-gray-400">ID Seller</label>
                                <select name="id_seller" id="id_seller" class="block w-full mt-1 form-select dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" required>
                                    <option value="">Select a Seller</option>
                                    @foreach($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_seller')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            

                            <!-- Nama Toko -->
                            <div>
                                <label for="nama_toko" class="text-sm font-semibold text-gray-700 dark:text-gray-400">Nama Toko</label>
                                <input type="text" name="nama_toko" id="nama_toko" class="block w-full mt-1 form-input dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" required>
                                @error('nama_toko')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat Toko -->
                            <div>
                                <label for="alamat_toko" class="text-sm font-semibold text-gray-700 dark:text-gray-400">Alamat Toko</label>
                                <textarea name="alamat_toko" id="alamat_toko" rows="4" class="block w-full mt-1 form-textarea dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" required></textarea>
                                @error('alamat_toko')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Foto Profil Toko -->
                            <div>
                                <label for="foto_profile_toko" class="text-sm font-semibold text-gray-700 dark:text-gray-400">Foto Profil Toko</label>
                                <input type="file" name="foto_profile_toko" id="foto_profile_toko" class="block w-full mt-1 form-input dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
                                @error('foto_profile_toko')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
