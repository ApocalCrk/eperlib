@extends('user.slicing.index')

@section('title', 'List Buku Dipinjam')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Riwayat Peminjaman Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Riwayat Peminjaman Buku</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="knowledge-base-search">
                <div class="row">
                    <div class="col-12">
                        <div class="card knowledge-base-bg text-center">
                            <div class="card-body">
                                <h2 class="text-primary">Selamat Datang di Riwayat Peminjaman Buku</h2>
                                <p class="card-text mb-2">
                                    <span>Temukan riwayat peminjaman buku yang pernah kamu pinjam</span>
                                </p>
                                <form class="kb-search-input">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="search"></i></span>
                                        <input type="text" class="form-control" id="searchbar"
                                            placeholder="Cari buku...">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="knowledge-base-content">
                <div class="row kb-search-content-info match-height">
                    @forelse ($riwayat as $item)
                    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                        <div class="card">
                            <a href="/user/riwayat/{{ $item->id_transaksi_peminjaman }}">
                                <img src="{{ asset('/storage/'.$item->buku->cover) }}"
                                    class="card-img-top" alt="knowledge-base-image" />
                                <div class="card-body text-center">
                                    <h4>{{ $item->buku->judul }}</h4>
                                    @if($item->pengembalian != null)
                                    <small>
                                        <span class="badge bg-success">
                                            Pengajuan Pengembalian Diterima
                                        </span>
                                    </small>
                                    @endif
                                    <p class="text-body mt-1 mb-0">
                                        {{ strip_tags($item->buku->tentang) }}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="/user/riwayat/{{ $item->id_transaksi_peminjaman }}" class="btn btn-primary w-100">Detail Peminjaman</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="card knowledge-base-bg">
                            <div class="card-body text-center">
                                <h2 class="text-primary">Buku yang Dipinjam Kosong</h2>
                                <p class="card-text">
                                    <span>Carilah buku yang ingin kamu pinjam dan lakukan peminjaman</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <!-- no result -->
                    <div class="col-12 text-center no-result no-items">
                        <h4 class="mt-4">Search result not found!!</h4>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
