<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="../img/logos.svg" loading="lazy">
    <title>Djajanan || {{ Route::currentRouteName() }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

      <!-- <link rel="stylesheet" href="https://rawcdn.githack.com/gragemediatechnology/keyFood/8dc3cd14766f16f255b2e9189d49417426d368b9/resources/css/app.css"> -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <span class="justify-center text-center">
        <p class="mx-auto">TIM Djajanan
        </p>
    </span>

    <script src="https://djajanan.com/livewire/livewire.js"></script>
    @livewireScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script src="https://cdn.jsdelivr.net/npm/livewire@0.6.1/lib/compiler.min.js"></script>
    <!-- <script src="https://rawcdn.githack.com/gragemediatechnology/keyFood/8dc3cd14766f16f255b2e9189d49417426d368b9/resources/js/app.js"></script> -->
</body>

</html>
