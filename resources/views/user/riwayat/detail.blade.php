@extends('user.slicing.index')

@section('title', 'Detail Peminjaman Buku')

@section('content')
<link rel="stylesheet" href="{{ asset('main-assets/css/pages/app-invoice.css') }}">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">
                                <div
                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="Logo"
                                                width="auto" height="40" />
                                            <h3 class="text-primary invoice-logo">UAJY Library</h3>
                                        </div>
                                    </div>
                                    <div class="mt-md-0 mt-2">
                                        <h4 class="invoice-title">
                                            Kode Peminjaman
                                            <span class="invoice-number">#{{$riwayat->id_transaksi_peminjaman}}</span>
                                            <br>
                                            <small class="text-success">Pengembalian Sukses</small>
                                        </h4>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 12rem;">Tanggal Dipinjam</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($riwayat->tanggal_pinjam)->format('d M Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 12rem;">Tanggal Dikembalikan</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($riwayat->pengembalian->tanggal_kembali)->format('d M Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 12rem;">Denda</p>
                                            <p class="invoice-date">Rp. {{ number_format($riwayat->pengembalian->denda, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="invoice-spacing" />
                            <div class="card-body invoice-padding pt-0">
                                <div class="row align-items-center d-flex">
                                    <img src="{{ asset('storage/'.$riwayat->buku->cover) }}" alt="Logo" width="100" height="100" class="col-4" />
                                    <div class="col-8">
                                        <h4 class="invoice-title">
                                            {{$riwayat->buku->judul}}
                                        </h4>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 10rem;">Kode Peminjaman</p>
                                            <p class="invoice-date">{{$riwayat->id_transaksi_peminjaman}}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 15rem;">ISBN</p>
                                            <p class="invoice-date">{{ $riwayat->buku->isbn }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- detail peminjaman buku -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-12">
                                        <h4 class="invoice-title">
                                            Detail Peminjaman
                                        </h4>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 8rem;">Nama</p>
                                            <p class="invoice-date">{{ $riwayat->member->nama }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 12rem;">NPM</p>
                                            <p class="invoice-date">{{ $riwayat->member->npm }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="invoice-spacing" />

                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12" style="text-align: justify;">
                                        <span class="fw-bold">Note:</span>
                                        <span> 
                                            @if($riwayat->pengembalian->keterangan != null)
                                                {{ $riwayat->pengembalian->keterangan }}
                                            @else
                                                Tidak keterangan tambahan terkait pengembalian buku.
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0">
                        <div class="card">
                            <div class="card-body">
                                <a href="/user/book/{{$riwayat->buku->isbn}}" class="btn btn-success w-100">
                                    <i data-feather="book" class="me-25"></i>
                                    <span>Detail Buku</span>
                                </a>
                                <a href="/user/riwayat" class="btn btn-primary w-100 mt-1">
                                    <i data-feather="arrow-left" class="me-25"></i>
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
