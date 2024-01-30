@extends('user.slicing.index')

@section('title', 'Likes')

@section('content')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Likes</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Buku Disukai</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0">{{ count($likeBook) }}</h2>
                        <p class="card-text">Buku disukai</p>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="heart" class="font-medium-5"></i>
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
                                <h2 class="text-primary">Selamat Datang di<br> Fitur Buku yang Disukai</h2>
                                <p class="card-text mb-2">
                                    <span>Carilah buku yang kamu sukai dan simpan untuk dibaca nanti</span>
                                </p>
                                <form class="kb-search-input">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="search"></i></span>
                                        @if(count($likeBook) > 0)
                                        <input type="text" class="form-control" id="searchbar"
                                            placeholder="Cari buku...">
                                        @else
                                        <input type="text" class="form-control" id="searchbar"
                                            placeholder="Buku yang Disukai Kosong" disabled>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="knowledge-base-content">
                <div class="row kb-search-content-info match-height">
                    @forelse ($likeBook as $book)
                    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                        <div class="card">
                            <a href="/user/book/{{ $book->isbn }}">
                                <img src="{{ asset($book->buku->cover) }}" class="card-img-top" alt="knowledge-base-image" />
                                <div class="card-body text-center">
                                    <h4>{{ $book->buku->judul }}</h4>
                                    <p class="text-body mt-1 mb-0">
                                        {{ strip_tags($book->buku->tentang) }}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="/user/book/{{ $book->isbn }}" class="btn btn-primary w-100">Detail Buku</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="card knowledge-base-bg">
                            <div class="card-body text-center">
                                <h2 class="text-primary">Buku yang Disukai Kosong</h2>
                                <p class="card-text">
                                    <span>Carilah buku yang kamu sukai dan simpan untuk dibaca nanti</span>
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