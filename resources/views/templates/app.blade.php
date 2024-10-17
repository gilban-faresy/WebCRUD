<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MB STORE</title>

    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="{{  asset('image/logoMB.png') }}">

    {{-- Tambahkan custom style untuk navbar fixed --}}
    <style>
        body {
            padding-top: 70px; /* Tambahkan padding top agar konten tidak tertutup navbar */
        }

        /* Tambahkan efek perubahan background navbar saat scroll */
        .navbar-scrolled {
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease-in-out;
        }
    </style>

    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top"> <!-- Tambah fixed-top agar navbar sticky -->
        <div class="container">
            <a class="navbar-brand {{ Route::is('welcome') ? 'active' : '' }}" aria-current="page" href="/">MB STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link {{ Route::is('landing_page') ? 'active' : '' }}" href="{{ route('landing_page') }}">Landing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('data_jual') ? 'active' : '' }}" href="{{ route('data_jual.data') }}">Data Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('kelola_akun') ? 'active' : '' }}" href="{{ route('kelola_akun.data') }}">kelola akun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten dinamis --}}
    @yield('content-dinamis')

    <footer></footer>

    {{-- CDN Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    {{-- Ajax --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Tambahkan script untuk mengubah tampilan navbar saat scroll --}}
    <script>
        $(window).scroll(function() {
            if ($(window).scrollTop() > 50) {
                $('.navbar').addClass('navbar-scrolled');
            } else {
                $('.navbar').removeClass('navbar-scrolled');
            }
        });
    </script>

    @stack('script')
</body>

</html>
