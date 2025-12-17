<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo-putih.png') }}">
    <title>{{ config('app.name') }} • @yield('title')</title>

    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta name="keywords" content="Praktikum Pemrograman Web 2, Universitas Gadjah Mada, proyek praktikum, aplikasi web, sistem informasi akademik, pembelajaran pemrograman, Laravel, pengembangan web, proyek mahasiswa"/>
    <meta name="author" content="Siti Nur Azizah"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta property="og:image" content="{{ asset('img/logo-putih.png') }}">

    <meta property="twitter:card" content="website">
    <meta property="twitter:url" content="#">
    <meta property="twitter:title" content="{{ config('app.name') }}">
    <meta property="twitter:description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta property="twitter:image" content="{{ asset('img/logo-putih.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @stack('css')
</head>
<body role="main" class="flex flex-col min-h-screen">

<nav class="bg-gray-100 border-b-4 border-[#C0392B]">
    <div class="max-w-screen-xl flex flex-wrap gap-3 items-center justify-between mx-auto p-4">
        
        {{-- LOGO & NAMA --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{ asset('img/logo.png') }}" class="h-12" alt="Logo UGM"/>
            <div class="flex flex-col leading-tight">
                <span class="text-lg md:text-xl font-bold text-[#631913]">Siti Nur Azizah</span>
                <span class="text-xs md:text-sm font-semibold text-[#631913]">24/533921/SV/23957</span>
            </div>
        </a>

        {{-- HAMBURGER BUTTON --}}
        <button id="menu-btn" type="button" class="inline-flex flex-none items-center p-1 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        {{-- MENU LINKS --}}
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            {{-- Tambahkan items-center disini agar menu sejajar vertikal --}}
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-[#C0392B] rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 items-center">
                <li>
                    {{-- Perbaikan: Mengganti "..." dengan class lengkap --}}
                    <a href="{{ route('home') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-110 text-[#96291F] hover:text-[#C0392B] @yield('menuhome')">Home</a>
                </li>
                <li>
                    <a href="{{ route('pekerjaan.index') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-110 text-[#96291F] hover:text-[#C0392B] @yield('menupekerjaan')">Pekerjaan</a>
                </li>
                <li>
                    <a href="{{ route('pegawai.index') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-110 text-[#96291F] hover:text-[#C0392B] @yield('menupegawai')">Pegawai</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<main class="flex-grow">
    @yield('content')
</main>

<footer class="bg-gray-900 shadow-sm mt-auto">
    {{-- Hapus div pembungkus yang berlebihan, cukup satu saja --}}
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-6">
        
        <div class="flex flex-col md:flex-row md:justify-between gap-4">
            {{-- BAGIAN KIRI: LOGO & ALAMAT --}}
            <div class="text-white">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('img/logo-putih.png') }}" class="w-12" alt="Logo UGM"/>
                    <div>
                        <p class="font-bold text-lg leading-tight">Universitas Gadjah Mada</p>
                        <p class="text-xs text-gray-400">Yogyakarta, Indonesia</p>
                    </div>
                </div>
                
                <div class="text-sm text-gray-300 space-y-1">
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 text-gray-500 fill-current" viewBox="0 0 640 640"><path d="M192 64C156.7 64 128 92.7 128 128L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 128C512 92.7 483.3 64 448 64L192 64zM304 416L336 416C353.7 416 368 430.3 368 448L368 528L272 528L272 448C272 430.3 286.3 416 304 416z"/></svg>
                        <span>Bulaksumur, Caturtunggal, Sleman, DIY 55281</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500 fill-current" viewBox="0 0 640 640"><path d="M224 128L224 208L288 208L288 128L434.7 128L480 173.3L480 208L544 208L544 173.3C544 156.3 537.3 140 525.3 128L480 82.7C468 70.7 451.7 64 434.7 64L288 64C252.7 64 224 92.7 224 128zM96 192C78.3 192 64 206.3 64 224L64 512C64 529.7 78.3 544 96 544L144 544C161.7 544 176 529.7 176 512L176 224C176 206.3 161.7 192 144 192L96 192z"/></svg>
                        <span>(0274) 588688</span>
                    </div>
                </div>
            </div>

            {{-- BAGIAN KANAN: IDENTITAS --}}
            <div class="text-white md:text-right mt-4 md:mt-0 border-t md:border-t-0 border-gray-700 pt-4 md:pt-0">
                <h2 class="mb-1 text-xs font-bold uppercase text-gray-400 tracking-wider">Identitas Mahasiswa</h2>
                <p class="font-semibold">Siti Nur Azizah</p>
                <p class="text-sm text-gray-300">24/533921/SV/23957</p>
                <p class="text-xs text-gray-500">Kelas PL3A2 PPW</p>
            </div>
        </div>

        <hr class="my-4 border-gray-700"/>
        
        <div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <span>© 2025 Universitas Gadjah Mada</span>
            <span>Responsi Praktikum Pemrograman Web 2</span>
        </div>
    </div>
</footer>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('navbar-default');
    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        menuBtn.setAttribute('aria-expanded', !menu.classList.contains('hidden'));
    });
</script>
@stack('js')
</body>
</html>