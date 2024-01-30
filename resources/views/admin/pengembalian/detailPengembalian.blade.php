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
                                            Peminjaman Buku
                                            <span class="invoice-number">#{{ $pengembalian->peminjaman->id_transaksi_peminjaman }}</span>
                                        </h4>
                                        <style>
                                            .invoice-date-title {
                                                width: 11rem!important;
                                            }
                                        </style>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Tanggal Pinjam</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_pinjam)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Tanggal Kembali</p>
                                            <p class="invoice-date">{{ \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_kembali)->format('d/m/Y') }}</p>
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
                                        <h6 class="mb-2">Peminjam</h6>
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
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
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
                                    <div class="col-xl-3 p-0 mt-xl-0 mt-2">
                                        <h6 class="mb-2">Permintaan Pengembalian</h6>
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
                                                    <td class="pe-1">Permintaan Pengembalian</td>
                                                    <td><span class="fw-bold">{{ \Carbon\Carbon::parse($pengembalian->created_at)->format('d/m/Y') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Status</td>
                                                    <td><span class="fw-bold">{{ $pengembalian->status }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xl-6 p-0 mt-xl-0 mt-2">
                                        <h6>Bukti Pengembalian</h6>
                                        <div class="d-flex">
                                            <div class="col-md-6 me-2">
                                                <img src="{{ $pengembalian->bukti_pengembalian }}" class="img-fluid mb-2" alt="bukti pengembalian" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="/admin/pengembalian/req" class="btn btn-outline-secondary w-100 mb-1">
                                    Kembali
                                </a>
                                <button class="btn btn-success w-100 mb-1" data-bs-toggle="modal" data-bs-target="#keterangan">
                                    Diterima
                                </button>
                                <button class="btn btn-danger w-100" data-bs-toggle="modal"
                                    data-bs-target="#tolakPengembalian">
                                    Ditolak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="modal modal-slide-in fade" id="keterangan" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Terima Permintaan Pengembalian</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form id="form-acc">
                                <div class="mb-1">
                                    <label class="form-label" for="noteAcc">Keterangan (Opsional)</label>
                                    <textarea class="form-control" id="noteAcc" name="noteAcc" rows="3"
                                        placeholder="Keterangan"></textarea>
                                </div>
                                <div class="d-flex flex-wrap mb-0">
                                    <button type="button" onclick="confirmPengembalian('{{$pengembalian->id_pengembalian}}')" class="btn btn-primary me-1"
                                        data-bs-dismiss="modal">Submit</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-slide-in fade" id="tolakPengembalian" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Tolak Permintaan Pengembalian</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form id="form-tolak">
                                <div class="mb-1">
                                    <label class="form-label" for="notePenolakan">Alasan Penolakan</label>
                                    <textarea class="form-control" id="notePenolakan" name="notePenolakan" rows="3"
                                        placeholder="Alasan penolakan"></textarea>
                                </div>
                                <div class="d-flex flex-wrap mb-0">
                                    <button type="button" onclick="rejectPengembalian('{{$pengembalian->id_pengembalian}}')" class="btn btn-primary me-1"
                                        data-bs-dismiss="modal">Submit</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    function confirmPengembalian(id){
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Pengembalian buku akan diterima",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7367f0',
            cancelButtonColor: '#EA5455',
            confirmButtonText: 'Ya, terima!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/pengembalian/req/acceptReq',
                    type: 'POST',
                    data: {
                        id_pengembalian: id,
                        keterangan: $('#noteAcc').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        toastr['success']('Permintaan pengembalian berhasil diterima', {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                        setTimeout(function () {
                            window.location.href = "/admin/pengembalian/req";
                        }, 2000);
                    },
                    error: function (data) {
                        toastr['error'](data.responseJSON.message, {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    }
                });
            }
        })
    }

    function rejectPengembalian(id){
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Pengembalian buku akan ditolak",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7367f0',
            cancelButtonColor: '#EA5455',
            confirmButtonText: 'Ya, tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/pengembalian/req/rejectReq',
                    type: 'POST',
                    data: {
                        id_pengembalian: id,
                        keterangan: $('#notePenolakan').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        toastr['success']('Permintaan pengembalian berhasil ditolak', {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                        setTimeout(function () {
                            window.location.href = "/admin/pengembalian/req";
                        }, 2000);
                    },
                    error: function (data) {
                        toastr['error'](data.responseJSON.message, {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    }
                });
            }
        })
    }
</script>
@endsection