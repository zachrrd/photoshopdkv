<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PhotoshopDKV') }}</title> {{-- Ubah default title jika perlu --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- KODE INLINE STYLE DARI NAVBAR.BLADE.PHP AKAN DIPINDAHKAN KE SINI --}}
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Styling khusus untuk navbar kustom */
    .bg-custom-green {
        background-color: #4C7F68 !important;
        /* Warna hijau kustom */
    }

    .bg-custom-green .navbar-brand,
    .bg-custom-green .nav-link,
    .bg-custom-green .dropdown-item {
        color: white !important;
        /* Teks putih untuk link di navbar */
    }

    .bg-custom-green .nav-link:hover,
    .bg-custom-green .dropdown-item:hover {
        color: #d4f5e6 !important;
        /* Warna hover yang lebih terang */
        background-color: #3b6554 !important;
        /* Background hover yang lebih gelap */
    }

    .bg-custom-green .dropdown-menu {
        background-color: #4C7F68;
        /* Warna background dropdown sama dengan navbar */
        border: none;
        /* Hapus border default dropdown */
    }

    /* CSS tambahan untuk logo */
    .navbar-brand img {
        height: 30px;
        /* Sesuaikan tinggi logo sesuai kebutuhan */
        margin-right: 8px;
        /* Jarak antara logo dan teks */
    }
    </style>

    {{-- Jika Anda memiliki CSS kustom di resources/css/app.css
         yang TIDAK menggunakan Tailwind dan ingin dimuat di sini,
         Anda bisa menggunakan @vite(['resources/css/app.css']) --}}

</head>

<body class="font-sans antialiased">

    {{-- Ini adalah tempat NAVIGASI/HEADER Anda --}}
    @include('layouts.partials.navbar')


    <main>
        @yield('content')
    </main>

    {{-- Ini adalah tempat FOOTER Anda, dari @section('footer') di detailproduk.blade.php --}}
    @yield('footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>

    {{-- Jika Anda memiliki JS kustom di resources/js/app.js (TIDAK menggunakan Alpine.js)
         dan ingin dimuat di sini, Anda bisa menggunakan @vite(['resources/js/app.js']) --}}
</body>

</html>