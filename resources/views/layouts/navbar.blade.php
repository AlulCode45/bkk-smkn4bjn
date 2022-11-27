<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/bkk-logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <link href="{{ asset('assets/front-end-assets/lity/lity.css') }}" rel="stylesheet">
    @yield('css')
    <title>Bursa Kerja Khusus SMKN 4 Bojonegoro</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow nav-top">
        <div class="container">
            <div class="navbar-brand">
                <a href="/">
                    <img src="{{ asset('assets/images/logo-navbar.png') }}" alt="Profil Sekolah" width="100px">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font1 profile px-3 {{ Request::is('visi&misi') || Request::is('programkerja') || Request::is('motto') || Request::is('strukturorganisasi') ? 'hover-active' : '' }}"
                            href="#" id="navProfile" role="button" data-bs-toggle="dropdown" disabled>
                            Profil
                        </a>
                        <ul class="dropdown-menu profileMenu" id="dropdown-id">
                            <a class="nav-link p-2 hover text-dropdown" href="/visi&misi">Visi Misi BKK</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/programkerja">Program Kerja BKK</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/motto">Motto BKK</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/strukturorganisasi">Struktur
                                Organisasi</a>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-rekapitulasi {{ Request::is('rekapitulasi') ? 'hover-active' : '' }}"
                            aria-current="page" href="/rekapitulasi">Rekapitulasi</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-lowongan {{ Request::is('data-lowongan') ? 'hover-active' : '' }}"
                            aria-current="page" href="{{ route('data_lowongan') }}">Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-perusahaan {{ Request::is('data-perusahaan') ? 'hover-active' : '' }}"
                            href="{{ route('data_perusahaan') }}">Perusahaan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font1 informasi {{ Request::is('berita') || Request::is('galeri') || Request::is('tracer-study') || Request::is('statistik') || Request::is('testimoni') || Request::is('rekapitulasi') ? 'hover-active' : '' }}"
                            href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" disabled>
                            Informasi
                        </a>
                        <ul class="dropdown-menu informasiMenu" aria-labelledby="navbarDropdown">
                            <a class="nav-link p-2 hover text-dropdown" href="/berita">Berita Terbaru</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/galeri">Galeri / Kegiatan</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/tracer-study">Tracer Study</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/testimoni">Testimoni</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/statistik">Statistik</a>
                            <a class="nav-link p-2 hover text-dropdown" href="/rekapitulasi">Rekapitulasi</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-kontak {{ Request::is('kontak') ? 'hover-active' : '' }}"
                            href="/kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-tutorial " href="https://youtu.be/qCVx0VLadxg"
                            data-lity>Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font1 px-3 nav-app "
                            href="https://bkk-smkn4bojonegoro.sch.id/myBKKSMKN4Bjn.apk">Download App</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        @if (Auth::check())
                            @if (Auth::user()->role == 4)
                                <a class="nav-link font1 login px-3" href="{{ route('master') }}"
                                    id="navbarDropdown">Dashboard</a>
                            @elseif (Auth::user()->role == 3)
                                <a class="nav-link font1 login px-3" href="{{ route('operator') }}"
                                    id="navbarDropdown">Dashboard</a>
                            @elseif (Auth::user()->role == 2)
                                <a class="nav-link font1 login px-3" href="{{ route('perusahaan') }}"
                                    id="navbarDropdown">Dashboard</a>
                            @elseif (Auth::user()->role == 1)
                                <a class="nav-link font1 login px-3" href="{{ route('siswa') }}"
                                    id="navbarDropdown">Dashboard</a>
                            @endif
                        @else
                            
                        @endif
                    </li> --}}
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font1 profileku" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                Profilku
                            </a>
                            <ul class="dropdown-menu profilekuMenu" aria-labelledby="navbarDropdown">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/profile/' . Auth::user()->foto_profile) }}"
                                        alt="{{ Auth::user()->name }}" class="rounded-circle" width="50px"
                                        height="50px">
                                </div>
                                <div class="dropdown-divider"></div>

                                <a href="{{ Auth::user()->role == 4 ? route('master.profile') : (Auth::user()->role == 3 ? route('operator.profile') : (Auth::user()->role == 2 ? route('perusahaan.profile') : (Auth::user()->role == 1 ? route('siswa.profile') : ''))) }}"
                                    class="nav-link p-2 hover text-dropdown">Profile</a>
                                @if (Auth::user()->role == 1)
                                    <a href="{{ route('siswa.lowonganKerja') }}"
                                        class="nav-link p-2 hover text-dropdown">Lowongan Kerja Saya</a>
                                @endif



                                @if (Auth::user()->role == 4)
                                    <a href="{{ route('master') }}"
                                        class="nav-link p-2 hover text-dropdown">Dashboard</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="nav-link p-2 hover text-dropdown">Logout</a>
                            </ul>
                        </li>
                    @else
                        <a class="nav-link font1 login px-3" href="{{ route('login') }}"
                            id="navbarDropdown">Login</a>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <!--
        Google Map
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15834.191125379666!2d111.9164663!3d-7.178154699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1667802909040!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    -->
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg"
        class="transition duration-300 ease-in-out delay-150">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#614385"></stop>
                <stop offset="95%" stop-color="#516395"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,400 C 0,400 0,200 0,200 C 195.7333333333333,239.33333333333334 391.4666666666666,278.6666666666667 536,262 C 680.5333333333334,245.33333333333331 773.8666666666666,172.66666666666666 916,153 C 1058.1333333333334,133.33333333333334 1249.0666666666666,166.66666666666669 1440,200 C 1440,200 1440,400 1440,400 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
            class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
    </svg>
    <section class="footer-info">
        <div class="container">
            <div class="row-cols-1 row-cols-md-4 row-cols-lg-4 d-md-flex row-footer-info">
                <div class="col info-sekolah mb-3">
                    <div class="flex-column">
                        <div class="sekolah">
                            <h3 class="text-white">SMKN 4 Bojonegoro</h3>
                        </div>
                        <div class="list-alamat">
                            <div class="jalan">
                                Jalan Raya Surabaya, Sukowati, Kapas, Bojonegoro, Jawa Timur 62181
                            </div>
                            <div class="telepon">
                                <b style="color: white !important;">Telp</b> : 083831722989
                            </div>
                            <div class="email">
                                <b>Email</b> : smkn4bojonegoro@yahoo.co.id
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col info-link">
                    <div class="flex-column list">
                        <div class="link">
                            <h3 class="text-white">Link Terkait</h3>
                        </div>
                        <div class="list-link ms-3">
                            <div class="link-1 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon> <a class="link-layanan"
                                    href="https://dindik.jatimprov.go.id/">Dinas Pendidikan Provinsi Jawa Timur</a>
                            </div>
                            <div class="link-2 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon> <a class="link-layanan"
                                    href="https://www.p3tki-jatim.go.id/disnaker/detail/22">Dinas Tenaga Kerja Provinsi
                                    Jawa Timur</a>
                            </div>
                            <div class="link-3 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon> <a class="link-layanan"
                                    href="https://aksibisa.ppsmkjatim.id/dudi/main">Forum Bursa Kerja (BKK Provinsi
                                    Jawa Timur)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col info-layanan">
                    <div class="flex-column list">
                        <div class="layanan">
                            <h3 class="text-white">Layanan</h3>
                        </div>
                        <div class="list-layanan ms-3">
                            <div class="layanan-1 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon>
                                <a href="" class="link-layanan">
                                    Kebijakan Penggunaan
                                </a>

                            </div>
                            <div class="layanan-2 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon>
                                <a href="" class="link-layanan">
                                    Kebijakan Privasi
                                </a>
                            </div>
                            <div class="layanan-3 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon>
                                <a href="" class="link-layanan">
                                    Tentang Kami
                                </a>
                            </div>
                            <div class="layanan-4 mb-2">
                                <ion-icon name="caret-forward-outline"></ion-icon>
                                <a href="" class="link-layanan">
                                    Site Map
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="flex-column">
                        <div class="sosial-media">
                            <h3 class="text-white">Sosial Media</h3>
                        </div>
                        <div class="list-sosial d-flex">
                            <div class="sosial-1 me-3 floating">
                                <a href="https://m.facebook.com/profile.php?id=100041667083245" class="facebook">
                                    <ion-icon name="logo-facebook" size="large"></ion-icon>
                                </a>
                            </div>
                            <div class="sosial-2 me-3">
                                <a href="https://www.youtube.com/channel/UCVPiXCwk-xc_DPXm0B2qZHQ"
                                    class="link-youtube">
                                    <ion-icon class="youtube" name="logo-youtube" size="large"></ion-icon>
                                </a>
                            </div>
                            <div class="sosial-3 me-3">
                                <a href="https://www.instagram.com/bkkmigasbjn/?hl=id">
                                    <img src="{{ asset('assets/images/instagram.png') }}" alt=""
                                        width="30px">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer mt-auto shadow-lg">
        <div class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="font2">
                    <h6 class="copyright">© Copyright <a href="https://www.instagram.com/rplsmkn4bojonegoro_/?hl=id"
                            class="link-rpl"><b class="bold text-white">Rekayasa Perangkat Lunak.</b></a> All Right
                        Reserved</h6>
                </div>
                <div class="ms-auto">
                    <span class="span-made-by text-white">Coded with <ion-icon name="heart-circle-outline"></ion-icon>
                        by
                        AMAL</span>
                    {{-- <ul class="dropdown-menu made">
                        <div class="dropdown-item">
                            <a href="" class="nav-link">Affansyah</a>
                        </div>
                    </ul> --}}
                </div>
            </div>
        </div>
    </footer>
    {{-- <script src="{{ asset('assets/front-end-assets/js/vendor/frameworks/frameworks.min.js') }}"></script> --}}
    <script src="{{ asset('assets/front-end-assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/front-end-assets/lity/lity.js') }}"></script>
    <script src="{{ asset('assets/front-end-assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/front-end-assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('assets/front-end-assets/js/LostStrap.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/63803664b0d6371309d0fd64/1gimd8uvr';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    @yield('js')

    <script>
        AOS.init();
    </script>

</body>

</html>
