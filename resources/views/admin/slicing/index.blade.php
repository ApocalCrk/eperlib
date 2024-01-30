<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>E - Perlib | @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('main-assets/images/icons/perlib.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/style-custom.css') }}">
    <script src="{{ asset('main-assets/vendors/js/vendors.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    @yield('css')
</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="" style="overflow-x: hidden;">

    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block clock"></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ Auth::guard('admin')->user()->nama }}</span>
                            <span class="user-status">{{ Auth::guard('admin')->user()->guard }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset('storage/avatar/avatar.png') }}" alt="avatar" height="40"
                            width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <form action="{{ route('logout_admin') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                        <a onclick="$('#logout-form').submit()" class="dropdown-item">
                            <i class="me-50" data-feather="log-out"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand"
                        href="../../../html/ltr/vertical-menu-template/index.html">
                        <span class="brand-logo">
                            <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="logo" />
                        </span>
                        <h2 class="brand-text">Dashboard</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active nav-item dashboard">
                        <a class="d-flex align-items-center" href="/admin/dashboard">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate">Halaman Utama</span>
                    </a>
                </li>
                <li class="navigation-header"><span>Pengelolaan Perpustakaan</span><i data-feather="more-horizontal"></i></li>
                <li class="nav-item book">
                    <a class="d-flex align-items-center" href="/admin/book">
                        <i data-feather="archive"></i>
                        <span class="menu-title text-truncate">Buku</span>
                    </a>
                </li>
                <li class="nav-item users">
                    <a class="d-flex align-items-center" href="/admin/users">
                        <i data-feather="users"></i>
                        <span class="menu-title text-truncate">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item peminjaman">
                    <a class="d-flex align-items-center" href="/admin/peminjaman">
                        <i data-feather="book"></i>
                        <span class="menu-title text-truncate">Peminjaman</span>
                    </a>
                </li>
                <li class="nav-item pengembalian">
                    <a class="d-flex align-items-center" href="/admin/pengembalian">
                        <i data-feather="clipboard"></i>
                        <span class="menu-title text-truncate">Pengembalian</span>
                    </a>
                </li>
                <li class="navigation-header"><span>Pengelolaan Ruangan</span><i data-feather="more-horizontal"></i></li>
                <li class="nav-item ruangan">
                    <a class="d-flex align-items-center" href="/admin/ruangan">
                        <i data-feather="sidebar"></i>
                        <span class="menu-title text-truncate">Ruangan</span>
                    </a>
                </li>
                <li class="nav-item booking">
                    <a class="d-flex align-items-center" href="/admin/ruangan/booking">
                        <i data-feather="clipboard"></i>
                        <span class="menu-title text-truncate">Booking</span>
                    </a>
                <li class="navigation-header"><span>Pengelolaan Admin</span><i data-feather="more-horizontal"></i></li>
                <li class="nav-item admin">
                    <a class="d-flex align-items-center" href="/admin/admin-list">
                        <i data-feather="users"></i>
                        <span class="menu-title text-truncate">Admin</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>


    <script src="{{ asset('main-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    @yield('js')
    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            setInterval(function () {
                var date = new Date();
                var hari = date.getDay();
                var tanggal = date.getDate();
                var bulan = date.getMonth();
                var tahun = date.getFullYear();
                var jam = date.getHours();
                var menit = date.getMinutes();
                var detik = date.getSeconds();
                var hariArray = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat",
                    "Sabtu");
                var bulanArray = new Array("Januari", "Februari", "Maret", "April", "Mei",
                    "Juni", "Juli", "Agustus", "September", "Oktober", "November",
                    "Desember");
                var hari = hariArray[hari];
                var bulan = bulanArray[bulan];
                var ampm = jam < 12 ? "AM" : "PM";
                jam = jam % 12;
                jam = jam ? jam : 12;
                jam = jam < 10 ? "0" + jam : jam;
                menit = menit < 10 ? "0" + menit : menit;
                detik = detik < 10 ? "0" + detik : detik;
                var time = hari + ", " + tanggal + " " + bulan + " " + tahun + " | " + jam +
                    ":" + menit + ":" + detik + " " + ampm;
                $(".clock").html(time);
            }, 1000);
        })
    </script>

</body>

</html>
