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
                                            <span class="invoice-number">#{{ $pinjaman->id_transaksi_peminjaman }}</span>
                                            <br>
                                            @if($pinjaman->pengembalian != null)
                                            <small class="text-danger">
                                                @if($pinjaman->pengembalian->status == 'ditolak')
                                                Pengajuan Pengembalian Ditolak, silahkan melakukan pengajuan pengembalian lagi.
                                                <br>
                                                <b>Alasan penolakan: {{ $pinjaman->pengembalian->keterangan }}</b>
                                                @else
                                                Pengembalian buku sudah diajukan
                                                @endif
                                            </small>
                                            @endif
                                        </h4>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 13rem;">Tanggal Dipinjam</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 13rem;">Tanggal Dikembalikan</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 13rem;">Denda</p>
                                            <p class="invoice-date">Rp. {{ $pinjaman->denda }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="invoice-spacing" />
                            <div class="card-body invoice-padding pt-0">
                                <div class="row align-items-center d-flex">
                                    <img src="{{ asset('storage/'.$pinjaman->buku->cover) }}" alt="Logo" width="100" height="100" class="col-4" />
                                    <div class="col-8">
                                        <h4 class="invoice-title">
                                            {{ $pinjaman->buku->judul }}
                                        </h4>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 10rem;">Kode Peminjaman</p>
                                            <p class="invoice-date">{{ $pinjaman->id_transaksi_peminjaman }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper justify-content-between">
                                            <p class="invoice-date-title" style="width: 15rem;">ISBN</p>
                                            <p class="invoice-date">{{ $pinjaman->buku->isbn }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="invoice-spacing" />

                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12" style="text-align: justify;">
                                        <span class="fw-bold">Note:</span>
                                        <span class>Harap dikembalikan tepat waktu, untuk pengembalian terdapat 2 cara
                                            yaitu dengan mengembalikan langsung ke perpustakaan dengan melihatkan
                                            barcode atau dengan mengisi form pengembalian yang terdapat di halaman
                                            ini. (Buku tidak bisa dikembalikan dengan cara mengisi form pengembalian jika terdapat denda atau hilang)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-success w-100" data-bs-toggle="modal"
                                    data-bs-target="#returnBook" data-pengembalian="{{ $pinjaman }}" data-buku="{{ $pinjaman->buku }}">
                                    <i data-feather="check" class="me-25"></i>
                                    <span>Pengembalian Buku</span>
                                </button>
                                <a href="/user/pengembalian_buku" class="btn btn-primary w-100 mt-1">
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

<div class="modal fade" id="returnBook" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Pengembalian Buku</h1>
                    <p>Kembalikan buku dengan cara memindai barcode buku atau dengan mengisi form dibawah ini.</p>
                </div>
                <div id="pengembalianBukuForm" class="row gy-1 pt-75">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="idTransaksiPeminjaman">ID Transaksi Peminjaman</label>
                        <input type="number" id="idTransaksiPeminjaman" name="idTransaksiPeminjaman"
                            class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="denda">Denda</label>
                        <input type="text" id="denda" name="denda" class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                    <label class="form-label" for="tanggalKembali">Tanggal Kembali</label>
                        <input type="date" id="tanggalKembali" name="tanggalKembali" class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                    <label class="form-label" for="rak">Rak</label>
                        <input type="text" id="rak" name="rak" class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="buktiPengembalian">Bukti Pengembalian Buku</label>
                        <input type="file" id="buktiPengembalian" name="buktiPengembalian" class="form-control"
                            accept="image/*"/>
                        <div class="text-danger mb-1 mt-50">
                            <small>*Usahakan foto bukti pengembalian buku terlihat jelas!</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-primary w-100" id="kirimPengembalian">
                            <i data-feather="check" class="me-25"></i>
                            <span>Kirim</span>
                        </a>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-warning w-100" 
                        data-bs-dismiss="modal" onclick="showBarcode()">
                            <i data-feather="code" class="me-25"></i>
                            <span>Barcode</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showBarcode" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent text-center">
                <h1 class="mb-1">Barcode Pengembalian</h1>
            </div>
            <div class="modal-body">
                <div class="text-center mb-2 bg-white">
                    <label style="font-family: 'Code39';font-size: 60px;color:black">*{{ time().$pinjaman->id_transaksi_peminjaman }}*</label>
                </div>
                <div class="col-12">
                    <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x" class="me-25"></i>
                        <span>Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showBarcode() {
        $('#showBarcode').modal('show');
    }
    
    $('#returnBook').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pengembalian = button.data('pengembalian');
        var buku = button.data('buku');
        var dateNow = new Date();
        var date = dateNow.getFullYear()+'-'+(dateNow.getMonth()+1)+'-'+dateNow.getDate();
        if(date > pengembalian.tanggal_kembali) {
            toastr['error']('Mohon maaf, buku yang anda pinjam sudah melewati batas waktu pengembalian!', 'Gagal Dikembalikan 🙁', {
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 3000
            });
            return false;
        }
        var modal = $(this);
        modal.find('.modal-body #idTransaksiPeminjaman').val(pengembalian.id_transaksi_peminjaman);
        modal.find('.modal-body #denda').val("Rp. "+pengembalian.denda);
        modal.find('.modal-body #tanggalKembali').val(date);
        modal.find('.modal-body #rak').val(buku.rak);
    });

    $('#kirimPengembalian').click(function (e) {
        e.preventDefault();
        var idTransaksiPeminjaman = $('#idTransaksiPeminjaman').val();
        $.ajax({
            url: '/user/pengembalian_buku/checkDataRequestPengembalian/' + idTransaksiPeminjaman,
            type: 'GET',
            success: function (response) {
                if (response.status == 'not found') {
                    var tanggalKembali = $('#tanggalKembali').val();
                    var buktiPengembalian = $('#buktiPengembalian')[0].files[0];
                    var formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('idTransaksiPeminjaman', idTransaksiPeminjaman);
                    formData.append('tanggal_kembali', tanggalKembali);
                    formData.append('buktiPengembalian', buktiPengembalian);
                    $.ajax({
                        url: '/user/pengembalian_buku/returnBook',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == 'success') {
                                toastr['success'](response.message, 'Pengembalian sedang diproses 😀', {
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 3000
                                });
                                setTimeout(function () {
                                    window.location.href = '/user/pengembalian_buku';
                                }, 1000);
                            } else {
                                toastr['error'](response.message, 'Gagal Dikembalikan 🙁', {
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 3000
                                });
                            }
                        },
                        error: function (response) {
                            if (idTransaksiPeminjaman == '' || tanggalKembali == '' || buktiPengembalian == undefined) {
                                toastr['error']('Mohon lengkapi form pengembalian buku!', 'Gagal Dikembalikan 🙁', {
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 3000
                                });
                            } else {
                                toastr['error']('Terjadi kesalahan pada server!', 'Gagal Dikembalikan 🙁', {
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    timeOut: 3000
                                });
                            }
                        }
                    });
                } else {
                    toastr['error']('Request pengembalian buku sudah pernah diajukan!', 'Gagal Dikembalikan 🙁', {
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 3000
                    });
                }
            }
        });
    });

</script>

@endsection
