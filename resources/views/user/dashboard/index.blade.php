@extends('user.slicing.index')

@section('title', 'Dashboard')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>Selamat Datang, {{Auth::user()->nama}}!</h2>
                                <p class="card-text font-small-3">
                                    @if($count_dikembalikan > 0)
                                    Kamu memiliki buku yang harus dikembalikan
                                    @else
                                    Silahkan melihat buku yang ada dalam perpustakaan!
                                    @endif
                                </p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="
                                    @if($count_dikembalikan > 0)
                                    /user/pengembalian_buku
                                    @else
                                    /user/book
                                    @endif
                                    " class="btn btn-primary">Lihat Buku</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Quick Stats</h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">Diperbarui 1 hari yang lalu</p>
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-primary me-2" style="height: 48px;">
                                                <div class="avatar-content">
                                                    <i data-feather="book" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $count_pinjaman }}</h4>
                                                <p class="card-text font-small-3 mb-0">Buku dipinjam</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-info me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="bookmark" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $count_bookmark }}</h4>
                                                <p class="card-text font-small-3 mb-0">Bookmarks</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-danger me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="heart" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $count_disukai }}</h4>
                                                <p class="card-text font-small-3 mb-0">Disukai</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2" style="height: 48px;">
                                                <div class="avatar-content">
                                                    <i data-feather="clipboard" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $count_dikembalikan }}</h4>
                                                <p class="card-text font-small-3 mb-0">Butuh dikembalikan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
