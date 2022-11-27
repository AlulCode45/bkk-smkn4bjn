<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from technext.github.io/adminmart/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 03:26:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>@yield('title') - Aplikasi BKK SMKN 4 BOJONEGORO</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>

    {{-- Data Table --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    {{-- Font Awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' />

    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .ck.ck-content:not(.ck-comment__input *) {
            height: 300px;
            overflow-y: auto;
        }

        .icon-status-lamaran {
            font-size: 50px;
        }
    </style>

    @yield('css')

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('assets/images/logo-navbar.png') }}" alt="homepage" class="dark-logo"
                                    height="50" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('assets/images/logo-navbar.png') }}" alt="homepage"
                                    class="light-logo" height="50" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <!--<span class="logo-text">-->
                            <!-- dark Logo text -->
                            <!--    <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage"-->
                            <!--        class="dark-logo" />-->
                            <!-- Light Logo text -->
                            <!--    <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo"-->
                            <!--        alt="homepage" />-->
                            <!--</span>-->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- End Notification -->
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/profile/' . Auth::user()->foto_profile) }}"
                                    alt="user" class="rounded-circle" width="40" height="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i
                                        data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item"
                                    href="{{ Auth::user()->role == 4 ? route('master.profile') : (Auth::user()->role == 3 ? route('operator.profile') : (Auth::user()->role == 2 ? route('perusahaan.profile') : (Auth::user()->role == 1 ? route('siswa.profile') : ''))) }}"><i
                                        data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                {{-- <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div> --}}
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{ Auth::user()->role == 4 ? route('master') : (Auth::user()->role == 3 ? route('operator') : (Auth::user()->role == 2 ? route('perusahaan') : (Auth::user()->role == 1 ? route('siswa') : '/'))) }}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="list-divider"></li>
                        @if (Auth::user()->role == 4)
                            <li class="nav-small-cap"><span class="hide-menu">Menu Pekerjaan</span></li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.perusahaan') }}"
                                    aria-expanded="false">
                                    <i data-feather="book" class="feather-icon"></i>
                                    <span class="hide-menu">Daftar Perusahaan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.lowongan') }}" aria-expanded="false">
                                    <i data-feather="tag" class="feather-icon"></i>
                                    <span class="hide-menu">Daftar Lowongan</span>
                                </a>
                            </li>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu Profile</span></li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.visi') }}" aria-expanded="false">
                                    <i data-feather="book" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Visi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.misi') }}" aria-expanded="false">
                                    <i data-feather="tag" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Misi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.mottoBkk') }}" aria-expanded="false">
                                    <i data-feather="tag" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Moto BKK</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.strukturBkk') }}"
                                    aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Struktur</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.programkerja') }}"
                                    aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Programkerja</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.sambutankepalasekolah') }}"
                                    aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Edit Sambutan Kepala Sekolah</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.berita') }}" aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Berita</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('master.gallery') }}" aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Gallery</span>
                                </a>
                            </li>
                        @elseif (Auth::user()->role == 3)

                        @elseif (Auth::user()->role == 2)
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu Pekerjaan</span></li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('perusahaan.lowongan') }}"
                                    aria-expanded="false">
                                    <i data-feather="book" class="feather-icon"></i>
                                    <span class="hide-menu">Daftar Lowongan</span>
                                </a>
                            </li>
                        @elseif (Auth::user()->role == 1)
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Menu Pekerjaan</span></li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('siswa.lowonganKerja') }}"
                                    aria-expanded="false">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Lowongan Kerja</span>
                                </a>
                            </li>
                        @endif
                        <li class="list-divider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Wellcome
                            {{ Auth::user()->name }}!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">@yield('name-page')</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select
                                class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->

            <!-- Container fluid  -->
            <div class="container-fluid">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi kesalahan dengan apa yang anda input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- End Container fluid  -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com/">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/ezoom.js') }}"></script>
    @yield('script-bawah')
</body>

</html>
