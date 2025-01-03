<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @if (request()->is('detailed-store'))
        @foreach ($cms as $company)
            <title>{{ $company->company_name }} ||
        @endforeach

        @foreach ($storeDetails as $detail)
            {{ $detail->nama_toko }}</title>
            <meta name="description" content="{{ $detail->alamat_toko }} - {{ $detail->deskripsi_toko }}">
            <meta property="og:title" content="Djajanan || {{ $detail->nama_toko }}" />
            <meta property="og:description" content="{{ $detail->alamat_toko }} - {{ $detail->deskripsi_toko }}" />
            <meta property="og:image"
                content="{{ $detail->foto_profile_toko ? 'https://djajanan.com/store_image/' . $detail->foto_profile_toko : 'https://djajanan.com/img/markets.webp' }}" />
            <meta property="og:url" content="{{ url()->full() }}" />
            <meta property="og:type" content="website" />
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="Djajanan || {{ $detail->nama_toko }}">
            <meta name="twitter:description" content="{{ $detail->alamat_toko }} - {{ $detail->deskripsi_toko }}">
            <meta name="twitter:image"
                content="{{ $detail->foto_profile_toko ? 'https://djajanan.com/store_image/' . $detail->foto_profile_toko : 'https://djajanan.com/img/markets.webp' }}">
        @endforeach
    @else
        @foreach ($cms as $company)
            <title>{{ $company->company_name }} || {{ Route::currentRouteName() }} </title>
        @endforeach
        <meta name="description"
            content="Djajanan - E-commerce untuk mempermudah jual beli! Temukan berbagai produk berkualitas dengan harga terjangkau, penawaran spesial, dan layanan pengiriman cepat. Shop now!">
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @yield('link')

    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/clock.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/profile.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/home.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/style.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/load.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/app.css">

    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/home-container.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/css/cart.css">
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/gragemediatechnology/keyFood/898403e73ffec5a26139d452a6d2ffa66d178334/public/css/nav.css">

    @foreach ($cms as $company)
        <link rel="icon" type="image/x-icon" href="../{{ $company->logo }}" loading="lazy">
    @endforeach
    {{-- ini diatas, disebelah dikasih title statis --}}

    <!-- SweetAlert CSS -->


    <style>
        /* Hide spinner for Chrome, Safari, and newer versions of Edge */
        .no-spinner::-webkit-inner-spin-button,
        .no-spinner::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    @php
        $admins = App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
    @endphp
    <div id="preloader">
        <dotlottie-player src="https://lottie.host/cfd42497-424b-4328-8abd-fddc7a43046c/RORTJFVPEA.json"
            background="transparent" speed="1" style="width: 300px; height: 300px;" loop
            autoplay></dotlottie-player>
    </div>
    @include('partials.navbar')

    <div class="container md:mt-10" id="container">
        @include('partials.profile')

        @yield('container')

        @include('partials.live-chat')
    </div>
    @include('partials.footer')
    @include('partials.bot-bar')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" async></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    @yield('script')

    <script defer
        src="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/js/clock.js">
    </script>
    <script defer
        src="https://rawcdn.githack.com/PT-Grage-Media-Technology/djajanan/9d3733e7c2f0a83eaf0e90577c8edb80c13f7e41/public/js/cart.js">
    </script>
    <script defer
        src="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/js/home.js">
    </script>
    <script defer
        src="https://rawcdn.githack.com/gragemediatechnology/keyFood/ea622abc460ff8dd056dcec020989ee66a3f878e/public_html/js/load.js">
    </script>
    <script defer
        src="https://rawcdn.githack.com/gragemediatechnology/keyFood/46ef1975afc1dce417ab00c89c9161e4f81c52e0/public_html/js/home-container.js">
    </script>
    <script defer
        src="https://rawcdn.githack.com/gragemediatechnology/keyFood/46ef1975afc1dce417ab00c89c9161e4f81c52e0/public_html/js/nav.js">
    </script>


    @if (Auth::check())
        <script>
            let timer;
            const countdown = 10 * 60 * 1000; // 10 menit dalam milidetik

            function resetTimer() {
                clearTimeout(timer);
                timer = setTimeout(logoutUser, countdown);
            }

            function logoutUser() {
                // Mengirim permintaan logout menggunakan AJAX
                fetch('{{ route('logout') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        _method: 'POST'
                    })
                }).then(response => {
                    if (response.ok) {
                        window.location.href = '/'; // Redirect ke homepage
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            }

            // Reset timer setiap ada aktivitas di halaman
            window.onload = resetTimer;
            window.onmousemove = resetTimer;
            window.onmousedown = resetTimer;
            window.ontouchstart = resetTimer;
            window.onclick = resetTimer;
            window.onkeypress = resetTimer;
            window.addEventListener('scroll', resetTimer, true);
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll("img");

            // Menambahkan lazy loading ke semua gambar yang tidak memiliki atribut loading
            images.forEach(img => {
                if (!img.hasAttribute("loading")) {
                    img.setAttribute("loading", "lazy");
                }
            });

            // Menggunakan IntersectionObserver untuk menunda pemuatan gambar saat mendekati area pandang
            const lazyLoadObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        // Mengganti data-src menjadi src untuk memuat gambar
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                        observer.unobserve(img);
                    }
                });
            });

            // Menambahkan gambar ke observer jika memiliki data-src untuk pemuatan lebih lanjut
            images.forEach(img => {
                if (img.dataset.src) {
                    lazyLoadObserver.observe(img);
                }
            });
        });
    </script>
    <!-- SweetAlert Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                setTimeout(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: @json($errors->first()),
                        timer: 5000, // Durasi tampilan alert dalam milidetik
                        showConfirmButton: true
                    });
                }, 5000); // Penundaan dalam milidetik (1 detik)
            @endif

            @if (session('success'))
                setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        timer: 500000, // Durasi tampilan alert dalam milidetik
                        showConfirmButton: true
                    });
                }, 500000); // Penundaan dalam milidetik (1 detik)
            @endif
        });
    </script>

    <!-- Sweet Alert Script -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 300000,
                showConfirmButton: true,
            });
        @endif
        @if (session('successVip'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('successVip') }}',
                timer: 300000,
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ok',
                cancelButtonText: 'Kembali ke Halaman Admin'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Do nothing, stay on the current page
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Redirect to the admin page when "Kembali ke Halaman Admin" is clicked
                    window.location.href =
                        'https://djajanan.com/admin/stores'; // Replace with the actual admin page URL
                }
            });
        @endif


        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 300000,
                showConfirmButton: true,
            });
        @endif
    </script>
</body>

</html>
