<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main-design.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    @stack('style')

    <title>KangPisMan {{ $title }}</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbars">
        <div class="navbar">
            <i class="bx bx-menu side-open"></i>
            <span class="logo navLogo">
                <a href="/">KangPisMan</a>
            </span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo">
                        <a href="/">KangPisMan</a>
                    </span>
                    <i class="bx bx-x side-close"></i>
                </div>
                <ul class="navlink">
                    <li><a class="{{ $title === '' ? 'nav-active' : '' }}" href="/">Home</a>
                    </li>
                    <li><a class="{{ $title === '| About' ? 'nav-active' : '' }}" href="/about">About Us</a></li>
                    <li><a class="{{ $title === '| Categories' ? 'nav-active' : '' }}" href="/categories">Categories</a>
                    </li>
                    @auth
                        <li><a href="/dashboard">Dashboard</a></li>
                    @endauth
                </ul>
            </div>
            <form method="GET" action="{{ route('categories.index') }}">
                <div class="searchBox">
                    <div class="searchToggle">
                        <i class="bx bx-x cancel"></i>
                        <i class="bx bx-search search"></i>
                    </div>
                    <div class="searchField">
                        <input type="text" name="search" value="{{ request()->input('search') }}"
                            placeholder="Search...">
                        {{-- <input type="text" placeholder="Search..." /> --}}
                        <i class="bx bx-search search"></i>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <!-- End of Navigation Bar -->

    <div class="main">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-header">KangPisman</div>
                <div class="footer-desc-wrapper">
                    <div class="footer-desc">Gerakan KangPisMan merupakan kependekan dari kata Kurangi, Pisahkan dan
                        Manfaatkan Sampah. Kurangi sampah berarti setiap warga memiliki kesadaran untuk menggunakan
                        kembali
                        barang-barang yang masih bisa digunakan. Seperti kertas bekas, botol bekas.</div>
                </div>
                <div class="footer-links">
                    <a href="https://www.instagram.com/kangpisman" target="_blank">
                        <i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
        <div class="footer-cr">Copyright &#169; 2023 KangPisMan</div>
    </footer>
    <!-- End of Footer -->

    @stack('script')
    <script src="{{ asset('js/navbar-script.js') }}"></script>
</body>

</html>
