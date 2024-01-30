<!DOCTYPE html>
<html class="loading" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>E - Perlib | @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('main-assets/images/icons/perlib.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/charts/apexcharts.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/app-invoice-list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/style-custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/page-knowledge-base.css') }}">
    <script src="{{ asset('main-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    <script>
        if (!/Mobi/.test(navigator.userAgent)) {
            window.location.href = "mobile-only";
            console.log("This site is accessible only on mobile devices.");
        }
    </script>

</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern">
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon"data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                            data-feather="search"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Jelajahi Perlib..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                        data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                            class="badge rounded-pill bg-danger badge-up">{{ $notifikasi->count() }}</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                <div class="badge rounded-pill badge-light-primary">{{ $notifikasi->count() }} Baru</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            @forelse($notifikasi as $item)
                            <a class="d-flex" href="/user/pengembalian_buku/{{ $item->peminjaman->id_transaksi_peminjaman }}" id="updateNotif" data-id="{{ $item->id_notification }}">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img
                                                src="{{ asset('storage/avatar/avatar.png')}}"
                                                alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Hai {{ $item->member->nama }}</span></p>
                                        <small class="notification-text fw-bolder">Jangan Lupa mengembalikan buku {{ $item->peminjaman->buku->judul }} pada tanggal {{ $item->peminjaman->tanggal_kembali }}.</small>
                                            <span href="/user/pengembalian_buku/{{ $item->peminjaman->id_transaksi_peminjaman }}" class="text-primary">Lihat Buku</span>
                                        </small>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="text-center">
                                <p class="fw-bolder">Tidak ada notifikasi</p>
                            </div>
                            @endforelse
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->nama }}</span><span
                                class="user-status">{{ Auth::user()->npm }}</span></div><span class="avatar"><img class="round"
                                src="/storage/{{ Auth::user()->avatar }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('profil') }}"><i class="me-50" data-feather="user"></i>
                            Profil</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout_user') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                        <a onclick="$('#logout-form').submit()" class="dropdown-item" href="#">
                            <i class="me-50" data-feather="log-out"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand"
                        href="{{ route('dashboard') }}">
                        <span class="brand-logo">
                            <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="">
                        </span>
                        <h2 class="brand-text">UAJY Library</h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item mt-2">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate">
                            Halaman Utama
                        </span>
                    </a>
                </li>
                <li class="navigation-header">
                    <span>
                        Fitur Peminjaman
                    </span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{ route('book') }}">
                        <i data-feather="archive"></i>
                        <span class="menu-title text-truncate">
                            List Semua Buku
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{ route('peminjaman') }}">
                        <i data-feather="book"></i>
                        <span class="menu-title text-truncate">
                            Peminjaman Buku
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{ route('pengembalian') }}">
                        <i data-feather="clipboard"></i>
                        <span class="menu-title text-truncate">
                            Pengembalian Buku
                        </span>
                    </a>
                </li>
                <li class="navigation-header"><span>Fitur Ruangan</span></li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/user/booking">
                        <i data-feather="calendar"></i>
                        <span class="menu-title text-truncate">
                            Booking Ruangan
                        </span>
                    </a>
                </li>
                <li class="navigation-header"><span>Profil</span></li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/user/bookmark">
                        <i data-feather="bookmark"></i>
                        <span class="menu-title text-truncate">
                            Bookmarks
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/user/like">
                        <i data-feather="heart"></i>
                        <span class="menu-title text-truncate">
                            Likes
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/user/riwayat">
                        <i data-feather="file-text"></i>
                        <span class="menu-title">
                            Riwayat Peminjaman
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('content')

    <footer class="footer footer-static footer-light text-center">
        <!-- <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">
            COPYRIGHT &copy; {{ date('Y') }}
            </span> 
        </p> -->
    </footer>

    @if(session('error'))
    <script>
        toastr.error("{{ session('error') }}", "Maaf 😥");
    </script>
    @endif

    <script>
        $('#updateNotif').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: '/user/dashboard/update_notifikasi/'+id,
                type: 'PUT',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(){
                    console.log('success');
                }
            });
        });
    </script>

    <script src="{{ asset('main-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>

    <script src="{{ asset('main-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app.js') }}"></script>

    <script src="{{ asset('main-assets/js/scripts/pages/page-knowledge-base.js') }}"></script>

    <script src="{{ asset('main-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>


    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

    </script>
</body>

</html>
