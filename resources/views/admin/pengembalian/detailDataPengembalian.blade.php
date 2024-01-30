@extends('admin.slicing.index')

@section('title', 'Detail Pengembalian')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.pengembalian').addClass('active');
    });
</script>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">
                                <!-- Header starts -->
                                <div
                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="Logo"
                                                width="50" />
                                            <h3 class="text-primary invoice-logo">UAJY Library</h3>
                                        </div>
                                        <p class="card-text mb-25">Jl. Babarsari No.43, Caturtunggal, Kec. Depok</p>
                                        <p class="card-text mb-25">Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                                        <p class="card-text mb-0">+62 (274) 487711</p>
                                    </div>
                                    <div class="mt-md-0 mt-2">
                                        <h4 class="invoice-title">
                                            Pengembalian Buku
                                            <span class="invoice-number">#{{ $pengembalian->id_pengembalian }}</span>
                                        </h4>
                                        <style>
                                            .invoice-date-title {
                                                width: 14rem!important;
                                            }
                                        </style>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Tanggal Pinjam</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_pinjam)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Tanggal Pengembalian</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pengembalian->tanggal_kembali)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Denda</p>
                                            <p class="invoice-date">Rp. {{ number_format($pengembalian->denda) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-5 p-0">
                                        <h6 class="mb-1">Peminjam</h6>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">NPM</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->member->npm }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Nama</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->member->nama }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Email</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->member->email }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Program Studi</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->member->program_studi }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-1">
                                        <h6 class="mb-2">Detail Buku</h6>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">ISBN</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->buku->isbn }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Judul Buku</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->buku->judul }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Penulis</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->buku->penulis }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Penerbit</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->peminjaman->buku->penerbit }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xl-3 p-0 mt-xl-0 mt-1">
                                        <h6 class="mb-2">Detail Pengembalian</h6>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">Tanggal Pinjam</td>
                                                    <td><span class="fw-bold">{{ \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_pinjam)->format('d/m/Y') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Tanggal Kembali</td>
                                                    <td><span class="fw-bold">{{ \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_kembali)->format('d/m/Y') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Pengembalian</td>
                                                    <td><span class="fw-bold">{{ \Carbon\Carbon::parse($pengembalian->tanggal_kembali)->format('d/m/Y') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Status</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->status }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if($pengembalian->bukti_pengembalian != null)
                                    <div class="col-xl-6 p-0 mt-xl-0">
                                        <h6 class="mt-2">Bukti Pengembalian</h6>
                                        <div class="d-flex">
                                            <div class="col-md-6 me-2">
                                                <img src="{{ $pengembalian->bukti_pengembalian }}" alt="Bukti Pengembalian" width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="/admin/pengembalian" class="btn btn-outline-secondary w-100">
                                    Kembali
                                </a>
                                @if($pengembalian->keterangan != null) <p class="mt-2"><b>Keterangan</b><br><span>{{ $pengembalian->keterangan }}</span></p> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
