<div class="container mx-auto mt-10">
    <button id="toggleButton" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none">
        Report a Bug or Request a Feature
    </button>

    <!-- Form Section -->
    <div id="formSection"
        class="hidden mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto transition-all duration-500 transform">
        <div class="title">
            <h1 class="font-bold text-center">Laporkan Toko atau Bug</h1>
        </div>

        <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
            <p class="w-1/2 mb-2 md:mb-0">Saya Ingin Melaporkan </p>
            <select class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
                <option value="select" selected>Pilih Opsi</option>
                <option value="bug">Laporkan Bug</option>
                <option value="feature">Produk Illegal</option>
                <option value="feedback">Toko Palsu</option>
                <option value="feedback">Foto Produk Hak Cipta</option>

            </select>
        </div>

        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mb-2">Nama Toko</label>
                <input id="title"
                    class="appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" placeholder="Masukkan Nama Toko">
            </div>

            <div class="text-sm flex flex-col">
                <label for="description" class="font-bold mt-4 mb-2">Deskripsi</label>
                <textarea id="description"
                    class="appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"
                    placeholder="Jelaskan Deskripsi Laporan Anda"></textarea>
            </div>
        </div>

        <div class="submit flex space-x-4 mt-8">
            <button type="submit"
                class="w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 text-center font-semibold focus:outline-none">
                Submit
            </button>
            <button id="cancelButton" type="button"
                class="w-full bg-red-600 shadow-lg text-white px-4 py-2 hover:bg-red-700 text-center font-semibold focus:outline-none">
                Cancel
            </button>
        </div>
    </div>
</div>
