@extends('layouts.main')

@section('link')
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/74094528fe5f3ca44c147b06f4c1039768fa9022/public_html/css/checkout.css">
@endsection

@section('container')
    <section id="home">
        <main class="mt-10">
            <section class="checkout-form">
                <form id="checkout-form" action="/checkout" method="post">
                    @csrf
                    <h2 class="font-manrope font-extrabold text-3xl lead-10 text-black mb-9">Pesanan Anda</h2>

                    @if ($loginType === 'email')
                        <!-- Email Input -->
                        <div class="form-control">
                            <label for="checkout-email">E-mail</label>
                            <div>
                                <span class="icon"><i class='bx bx-envelope'></i></span>
                                <input type="email" id="checkout-email" name="checkout-email"
                                    placeholder="Enter your email.. (opsional)."
                                    value="{{ old('checkout-email', $user->email ?? '') }}">
                            </div>
                        </div>
                        <!-- Phone Input -->
                        <div class="form-control">
                            <label for="checkout-phone">No. Telepon</label>
                            <div>
                                <span class="icon"><i class='bx bx-phone'></i></span>
                                <input type="tel" name="checkout-phone" id="checkout-phone"
                                    placeholder="Enter your phone..."
                                    value="{{ old('checkout-phone', $user->phone ?? '') }}" required>
                            </div>
                        </div>
                    @endif


                    @if ($loginType === 'phone')
                        <!-- Email Input -->
                        <div class="form-control">
                            <label for="checkout-email">E-mail</label>
                            <div>
                                <span class="icon"><i class='bx bx-envelope'></i></span>
                                <input type="email" id="checkout-email" name="checkout-email"
                                    placeholder="Enter your email.. (opsional)."
                                    value="{{ old('checkout-email', $user->email ?? '') }}">
                            </div>
                        </div>
                        <!-- Phone Input -->
                        <div class="form-control">
                            <label for="checkout-phone">No. Telepon</label>
                            <div>
                                <span class="icon"><i class='bx bx-phone'></i></span>
                                <input type="tel" name="checkout-phone" id="checkout-phone"
                                    placeholder="Enter your phone..."
                                    value="{{ old('checkout-phone', $user->phone ?? '') }}" required>
                            </div>
                        </div>
                    @endif

                    <br>
                    <!-- Shipping Address -->
                    <h3>Alamat Pengiriman</h3>
                    <div class="form-control">
                        <label for="checkout-name">Nama Lengkap</label>
                        <div>
                            <span class="icon"><i class='bx bx-user-circle'></i></span>
                            <input type="text" id="checkout-name" name="checkout-name" placeholder="Enter your name..."
                                value="{{ old('checkout-name', $user->name ?? '') }}" required>
                        </div>
                    </div>
                    <!-- Adress Dropdown -->
                    <div class="form-control">
                        <label for="cluster-select">Pilih Tipe Pengiriman</label>
                        <div>
                            <span class="icon"><i class='bx bx-building'></i></span>
                            <select class="dropdown-alamat" name="cluster_id" id="cluster-select" required>
                                <option value="" disabled selected>Pilih Tipe Pengiriman...</option>
                                @foreach ($clusters as $cluster)
                                    <option value="{{ $cluster->id }}">{{ $cluster->nama_cluster }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Input untuk Di Kirim Penjual -->
                    <div class="form-control hidden" id="input-dikirim-penjual">
                        <label for="alamat-select">Masukkan Data Yang Dibutuhkan</label>
                        <div>
                            <span class="icon"><i class='bx bx-home'></i></span>
                            <input type="text" name="alamat_cluster" id="alamat-select"
                                placeholder="Masukkan Alamat Anda...">
                        </div>
                    </div>

                    <!-- Input untuk Pakai Jasa Kirim -->
                    <div class="form-control hidden" id="input-pakai-jasa-kirim">
                        <label for="jasa-kirim-input">Masukkan Nomor Telepon</label>
                        <div>
                            <span class="icon"><i class='bx bx-phone'></i></span>
                            <select class="dropdown-alamat" name="alamat_cluster_id" id="jasa-kirim-input">
                                <option value="" disabled selected>Pilih Nomor Jasa Kirim...</option>
                                @foreach ($nomors as $nomor)
                                    <option value="{{ $nomor->id }}">{{ $nomor->alamat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Input untuk Ambil Di Tempat -->
                    <div class="form-control hidden" id="input-ambil-di-tempat">
                        <label for="toko-alamat">Lokasi Toko</label>
                        <div>
                            <span class="icon"><i class='bx bx-store'></i></span>

                                <input type="text" id="toko-alamat" disabled>
                                <input type="text" name="alamat_cluster_default" id="toko-alamatInput" value=""
                                placeholder="Silahkan Ambil Di" hidden>
                        </div>
                    </div>
                    <!-- Nomor Dropdown -->
                    <div class="form-control" hidden>
                        <label for="nomor-select">Pilih Nomor</label>
                        <div>
                            <select name="nomor_id" id="nomor-select">
                                <option value="" disabled selected>Pilih Nomor...</option>
                            </select>
                            <input type="text" name="nomor_id" id="nomor-select" placeholder="Masukkan Alamat Anda..."
                                value=" " required>
                        </div>
                    </div>
                    <!-- Notes Input -->
                    <div class="form-control">
                        <label for="checkout-notes">Catatan</label>
                        <div>
                            <span class="icon"><i class='bx bx-edit'></i></span>
                            <input type="text" name="checkout-notes" id="checkout-notes"
                                placeholder="Catatan Anda.. (opsional)" value="{{ old('checkout-notes') }}">
                        </div>
                    </div>
                    <!-- Hidden Inputs for Products and Total Price -->
                    <input type="hidden" name="products" id="products" required>
                    <input type="hidden" name="total_price" id="hidden-total-price" required>
                    <div class="form-control-btn">
                        <button type="submit">Checkout</button>
                    </div>
                </form>
            </section>

            <section class="checkout-details mt-20">
                <div class="checkout-details-inner">
                    <div class="checkout-lists" id="checkout-lists">
                        <!-- Card products will be appended here by JavaScript -->
                    </div>
                    <div class="checkout-total">
                        <h6>Total</h6>
                        <p class="total-price" id="total-price">Rp 0</p>
                    </div>
                </div>
            </section>
        </main>
    </section>

    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            const products = JSON.parse(localStorage.getItem('cart')) || [];
            const totalPrice = document.getElementById('total-price').textContent.replace(/[^\d]/g,
                ''); // Menghilangkan simbol 'Rp' dan koma

            document.getElementById('products').value = JSON.stringify(products);
            document.getElementById('hidden-total-price').value = totalPrice;

        });



        // Event listener for the cluster dropdown change
        // document.getElementById('cluster-select').addEventListener('change', function() {
        //     const clusterId = this.value;
        //     const alamatSelect = document.getElementById('alamat-select');

        //     // Clear the alamat dropdown
        //     alamatSelect.innerHTML = '<option value="" disabled selected>Memuat alamat...</option>';

        //     fetch(`/get-alamat-by-cluster/${clusterId}`)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Gagal mengambil data alamat.');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             alamatSelect.innerHTML = '<option value="" disabled selected>Pilih Alamat...</option>';
        //             data.forEach(function(alamat) {
        //                 const option = document.createElement('option');
        //                 option.value = alamat.id;
        //                 option.textContent = alamat.alamat;
        //                 alamatSelect.appendChild(option);
        //             });
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Terjadi kesalahan saat mengambil data alamat. Silakan coba lagi.');
        //         });
        // });

        // Event listener for the alamat dropdown change
        // document.getElementById('alamat-select').addEventListener('change', function() {
        //     const blokId = this.value;
        //     const nomorSelect = document.getElementById('nomor-select');

        //     // Clear the nomor dropdown
        //     nomorSelect.innerHTML = '<option value="" disabled selected>Memuat nomor...</option>';
        //     nomorSelect.disabled = true;

        //     if (blokId) {
        //         fetch(`/get-nomor-by-blok/${blokId}`)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Gagal mengambil data nomor blok.');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 nomorSelect.innerHTML = '<option value="" disabled selected>Pilih Nomor...</option>';
        //                 data.forEach(function(nomor) {
        //                     const option = document.createElement('option');
        //                     option.value = nomor.id;
        //                     option.textContent = nomor.nomor;
        //                     nomorSelect.appendChild(option);
        //                 });
        //                 nomorSelect.disabled = false;
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //                 alert('Terjadi kesalahan saat mengambil data nomor blok. Silakan coba lagi.');
        //             });
        //     } else {
        //         nomorSelect.innerHTML = '<option value="" disabled selected>Pilih Nomor...</option>';
        //         nomorSelect.disabled = true;
        //     }
        // });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const clusterSelect = document.getElementById('cluster-select');
            const inputDikirimPenjual = document.getElementById('input-dikirim-penjual');
            const inputPakaiJasaKirim = document.getElementById('input-pakai-jasa-kirim');
            const inputAmbilDiTempat = document.getElementById('input-ambil-di-tempat');

            clusterSelect.addEventListener('change', (event) => {
                // Reset semua input
                inputDikirimPenjual.classList.add('hidden');
                inputPakaiJasaKirim.classList.add('hidden');
                inputAmbilDiTempat.classList.add('hidden');

                const selectedValue = event.target.value;

                if (selectedValue === '2') {
                    inputDikirimPenjual.classList.remove('hidden');
                } else if (selectedValue === '3') {
                    inputPakaiJasaKirim.classList.remove('hidden');
                } else if (selectedValue === '1') {
                    populateAllAlamatToko('cart');
                    inputAmbilDiTempat.classList.remove('hidden');
                }
            });
        });
    </script>

    <script>
        // Fungsi untuk mengambil semua alamat_toko dari Local Storage
        function populateAllAlamatToko(key) {
            // Mendapatkan item dari Local Storage
            const data = JSON.parse(localStorage.getItem(key));

            if (data) {
                // Mengambil semua kombinasi `name` (nama produk) dan `alamat_toko`
                const allNamaProdukAlamatToko = Object.values(data)
                    .map((item) => {
                        const namaProduk = item.name || 'Produk Tidak Diketahui';
                        const alamatToko = item.alamat_toko || 'Alamat Tidak Diketahui';
                        return `${namaProduk} di ${alamatToko}`; // Format: nama_produk di alamat_toko
                    })
                    .join(', '); // Menggabungkan semua item dengan koma

                // Memasukkan hasil ke input field
                document.getElementById('toko-alamat').value = `Silahkan Ambil ${allNamaProdukAlamatToko}`;
                document.getElementById('toko-alamatInput').value = `Silahkan Ambil ${allNamaProdukAlamatToko}`;
            } else {
                console.error('Data tidak ditemukan di Local Storage!');
            }
        }

        // Memanggil fungsi dengan key Local Storage
        populateAllAlamatToko('cart'); // Pastikan key sesuai dengan nama di Local Storage
    </script>

@endsection

@section('script')
    <script defer src="https://raw.githack.com/PT-Grage-Media-Technology/djajanan/main/public/js/checkout.js"></script>
@endsection
