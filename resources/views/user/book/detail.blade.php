@extends('user.slicing.index')

@section('title', 'Detail Buku')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Detail Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/user/book">Daftar Buku</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Detail Buku</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached content-left">
            <div class="content-body">
                <div class="blog-detail-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <img src="{{ asset('storage/'.$buku->cover) }}" class="img-fluid card-img-top"/>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $buku->judul }}</h4>
                                    <div class="author-info">
                                        <small class="text-muted me-25">by</small>
                                        <small><a href="#" class="text-body">{{ $buku->penulis }}</a></small>
                                        <span class="text-muted ms-50 me-25">|</span>
                                        <small class="text-muted">{{ Carbon\Carbon::parse($buku->created_at)->format('M d, Y') }}</small>
                                    </div>
                                    <div class="my-1 py-25">
                                        @php
                                            $randomize_color = [
                                                'danger', 'success', 'info', 'warning', 'primary', 'secondary'   
                                            ];
                                        @endphp
                                        @foreach($buku->kategori as $kategori)
                                        <a href="#">
                                            <span class="badge rounded-pill badge-light-{{ $randomize_color[rand(0, count($randomize_color)-1)] }} me-50">{{ $kategori }}</span>
                                        </a>
                                        @endforeach
                                    </div>
                                    <p class="card-text mb-2" style="text-align: justify;">
                                        {{ strip_tags($buku->tentang) }}
                                    </p>
                                    <h6 class="mb-25">Tentang buku: </h6>
                                    <div class="row justify-content-between d-flex">
                                        <div class="col-md-4 col-12">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-25">
                                                    <span>ISBN</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->isbn }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Penulis</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->penulis }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Penerbit</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->penerbit }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Tahun Terbit</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->tahun_terbit }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Jumlah Halaman</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->jumlah_halaman }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-25">
                                                    <span>Kategori</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->kategori[0] }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Jumlah Buku</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->jumlah_buku }}</span>
                                                </li>
                                                <li class="d-flex mb-25">
                                                    <span>Rak</span>
                                                    <span class="ms-auto fw-bold">{{ $buku->rak }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr class="my-2" />
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center me-1">
                                                <form action="/user/book/addLikeBook/{{ $buku->isbn }}" method="post" id="addLikeBookForm">@csrf</form>
                                                <a onclick="$('#addLikeBookForm').submit()" class="me-50">
                                                    <i data-feather="heart"
                                                    class="font-medium-5 align-middle @if(isset($checkLikeBook)) text-danger fill-current @endif"></i>
                                                </a>
                                                <a href="#">
                                                    <div class="text-body align-middle">{{ $getLikeBookCount }}</div>
                                                </a>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <form action="/user/book/addBookmark/{{ $buku->isbn }}" method="post" id="addBookmarkForm">@csrf</form>
                                                <a onclick="$('#addBookmarkForm').submit()" class="me-50">
                                                    <i data-feather="bookmark"
                                                        class="font-medium-5 align-middle @if(isset($checkBookmark)) text-success fill-current @endif"></i>
                                                </a>
                                                <a href="#">
                                                    <div class="text-body align-middle">{{ $getBookmarkCount }}</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown blog-detail-share">
                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"></i>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="facebook" class="font-medium-3"></i>
                                                    Facebook
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="twitter" class="font-medium-3"></i>
                                                    Twitter
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="linkedin" class="font-medium-3"></i>
                                                    Linkedin
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-detached sidebar-right">
            <div class="sidebar">
                <div class="blog-sidebar my-1 my-lg-0">
                    <div class="blog-search">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Search here" />
                            <span class="input-group-text cursor-pointer">
                                <i data-feather="search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="blog-recent-posts mt-2">
                        <h6 class="section-label">Recommended Books</h6>
                        <div class="mt-75">
                            @foreach($recommendBook as $book)
                            <div class="d-flex mb-2">
                                <a href="/user/book/{{ $book->isbn }}" class="me-2">
                                    <img class="rounded" src="{{ asset('storage/'.$book->cover) }}"
                                        width="70" height="70"/>
                                </a>
                                <div class="blog-info">
                                    <h6 class="blog-recent-post-title">
                                        <a href="/user/book/{{ $book->isbn }}" class="text-body-heading">{{ $book->judul }}</a>
                                    </h6>
                                    <div class="text-muted mb-0">{{ $book->penulis }}</div>
                                    <div class="text-muted mb-0">{{ Carbon\Carbon::parse($book->created_at)->format('M d, Y') }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    $('document').ready(function() {
        toastr['success']('{{ session("success") }}', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        });
    });
</script>
@endif

@endsection
