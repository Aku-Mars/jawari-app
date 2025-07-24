<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Meta tag --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website JAWARI – Kesenian, Galeri, Artikel dan Budaya Lokal">
    <meta name="keywords"
        content="tarian banten, banten, serang, tangerang, cilegon, jawari, budaya, kesenian, galeri, artikel, lokal">
    <meta name="author" content="Diskominfosatik Kab. Serang">

    <title>@yield('title', 'JAWARI')</title>

    <link rel="icon" href="{{ asset('jawari-logo.png') }}" type="image/png">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap"
        rel="stylesheet">

    {{-- Styles / Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased scroll-smooth">
    @livewire('components.navbar', ['activeLink' => trim($__env->yieldContent('activeLink'))])

    @yield('content')

    @livewire('components.footer')

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>

</html>
