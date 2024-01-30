@extends('user.slicing.index')

@section('title', 'Bookmarks')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Bookmarks</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Bookmarks</a>
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
                                <h2 class="text-primary">Selamat Datang di Bookmarks</h2>
                                <p class="card-text mb-2">
                                    <span>Cari buku yang kamu sukai dan bookmark untuk dibaca nanti</span>
                                </p>
                                <form class="kb-search-input">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="search"></i></span>
                                        @if(count($bookmark) > 0)
                                        <input type="text" class="form-control" id="searchbar"
                                            placeholder="Cari buku...">
                                        @else
                                        <input type="text" class="form-control" id="searchbar"
                                            placeholder="Bookmark Kosong" disabled>
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
                    @forelse ($bookmark as $book)
                    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                        <div class="card">
                            <a href="/user/book/{{ $book->isbn }}">
                                <img src="{{ asset($book->buku->cover) }}"
                                    class="card-img-top" alt="knowledge-base-image" />
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
                                <h2 class="text-primary">Bookmark Kosong</h2>
                                <p class="card-text">
                                    <span>Belum ada buku yang kamu bookmark</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <!-- no result -->
                    <div class="col-12 text-center no-result no-items">
                        <h4 class="mt-4">Search result not found!</h4>
                    </div>
                </div>
            </section>
            <!-- Knowledge base ends -->

        </div>
    </div>
</div>
@endsection