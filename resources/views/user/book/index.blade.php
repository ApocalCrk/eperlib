@extends('user.slicing.index')

@section('title', 'List Semua Buku')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Daftar Semua Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Daftar Buku</a>
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
                                <h2 class="text-primary">Selamat Datang di<br>Daftar Buku Perpustakaan</h2>
                                <p class="card-text mb-2">
                                    <span>Pencariaan Populer: </span><span class="fw-bolder">Teknologi, Science</span>
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
                    <div class="col-md-4 col-sm-6 col-12 kb-search-content highlight-feature">
                        <div class="card">
                            <a href="#">
                                <img src="{{ asset('main-assets/images/illustration/api.svg') }}" class="card-img-top"
                                    alt="knowledge-base-image" />

                                <div class="card-body text-center">
                                    <h4>Data Buku Perpustakaan</h4>
                                    <p class="text-body mt-1 mb-0">
                                        Peminjaman dapat dilakukan dengan melakukan scan barcode buku yang akan
                                        dipinjam.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12 kb-search-content highlight-feature">
                        <div class="card">
                            <a href="#">
                                <img src="{{ asset('main-assets/images/illustration/marketing.svg') }}"
                                    class="card-img-top" alt="knowledge-base-image" />
                                <div class="card-body text-center">
                                    <h4>Pengembalian Buku Perpustakaan</h4>
                                    <p class="text-body mt-1 mb-0">
                                        Pengembalian buku dapat dilakukan dengan melakukan scan barcode buku yang akan
                                        dikembalikan.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    @foreach($listBuku as $buku)
                    <div class="col-md-4 col-sm-6 col-12 kb-search-content book d-none">
                        <div class="card">
                            <a href="/user/book/{{ $buku->isbn }}">
                                <img src="{{ asset('storage/'.$buku->cover) }}"
                                    class="card-img-top" alt="knowledge-base-image" />
                                <div class="card-body text-center">
                                    <h4>{{ $buku->judul }}</h4>
                                    <p class="text-body mt-1 mb-0">
                                        {{ strip_tags($buku->tentang) }}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="/user/book/{{ $buku->isbn }}" class="btn btn-primary w-100">Detail Buku</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    <!-- no result -->
                    <div class="col-12 text-center no-result no-items">
                        <h4 class="mt-4">Search result not found!!</h4>
                    </div>
                </div>
            </section>
            <!-- Knowledge base ends -->

        </div>
    </div>
</div>

@endsection
