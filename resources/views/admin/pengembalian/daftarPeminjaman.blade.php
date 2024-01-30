@extends('admin.slicing.index')

@section('title', 'Pengembalian')

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
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Pengembalian Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active">Pengembalian Buku
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4>Daftar Peminjaman</h4>
                                <a href="/admin/pengembalian"
                                    class="btn btn-primary">
                                    <i data-feather="arrow-left"></i>
                                    Kembali</a>
                            </div>
                            <div class="card-datatable">
                                <style>
                                    tr, td, .aksi{
                                        text-align: center;
                                        justify-content: center;
                                    }
                                </style>
                                <table class="dt-responsive table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>ISBN</th>
                                            <th>NPM</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade" id="diterima" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Terima Pengembalian Buku</h1>
                    <p>Terima pengembalian buku dari peminjam</p>
                </div>
                <form id="acc-pengembalian" class="row gy-1 pt-75">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="id_transaksi_peminjaman">ID Transaksi Peminjaman</label>
                        <input type="number" id="id_transaksi_peminjaman" name="id_transaksi_peminjaman"
                            class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="denda">Denda</label>
                        <input type="text" id="denda" name="denda" class="form-control" value="0" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" readonly/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="status">Status Pembayaran</label>
                        <input type="text" id="status" name="status" class="form-control" value="Tidak ada denda" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="keterangan">Keterangan (Opsional)</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Cacatan Keterangan"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal" onclick="acceptPengembalian()">
                            <i data-feather="check" class="me-25"></i>
                            <span>Terima</span>
                        </button>
                    </div>
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x" class="me-25"></i>
                            <span>Kembali</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notifikasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Kirim Notifikasi Peminjaman</h1>
                    <p>Kirim notifikasi ke peminjam bahwa buku belum dikembalikan</p>
                </div>
                <form id="kirim_notifikasi" class="row gy-1 pt-75">
                    @csrf
                    <input type="hidden" id="id_transaksi_peminjaman" name="id_transaksi_peminjaman" class="form-control" />
                    <div class="col-12">
                        <label class="form-label" for="pesan">Keterangan</label>
                        <textarea id="pesan" name="pesan" class="form-control" placeholder="Cacatan Keterangan"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal" onclick="sendNotifikasi()">
                            <i data-feather="send" class="me-25"></i>
                            <span>Kirim</span>
                        </button>
                    </div>
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x" class="me-25"></i>
                            <span>Kembali</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var dt_responsive = $('.dt-responsive').DataTable({
            ajax: '/admin/pengembalian/getDataPeminjaman',
            columns: [{
                    data: 'responsive_id'
                },
                {
                    data: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    data: 'judul'
                },
                {
                    data: 'isbn'
                },
                {
                    data: 'npm'
                },
                {
                    data: 'aksi',
                    render: function (data, type, row, meta) {
                        return `<a class='btn btn-info btn-sm' onclick="accept(${row.id_transaksi_peminjaman})">Terima</a>
                                <a class='btn btn-danger btn-sm' onclick="notifikasi(${row.id_transaksi_peminjaman})">Kirim Notifikasi</a>`
                    }
                },
            ],
            columnDefs: [{
                className: 'control',
                orderable: false,
                targets: 0
            }, ],
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Peminjaman Buku ' + data['judul'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' && col.columnIndex != 1 ?
                                '<tr data-dt-row="' +
                                col.rowIdx +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                '' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>' :
                                '';
                        }).join('');

                        return data ? $('<table class="table"/>').append('<tbody>' + data +
                            '</tbody>') : false;
                    }
                }
            },
            language: {
                paginate: {
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
    });

    function accept(id) {
        $.ajax({
            url: '/admin/pengembalian/detailDataPeminjaman/' + id,
            type: 'GET',
            success: function (data) {
                $('#id_transaksi_peminjaman').val(data.id_transaksi_peminjaman);
                $('#denda').val(data.denda);
                $('#tanggal_kembali').val(new Date().toISOString().slice(0, 10));
                $('#status').val(data.status);
                $('#diterima').modal('show');
            }
        });
        $('#diterima').modal('show');
    }

    function notifikasi(id_transaksi_peminjaman) {
        $('#notifikasi').modal('show');
        $('#id_transaksi_peminjaman').val(id_transaksi_peminjaman);
    }

    function sendNotifikasi() {
        $.ajax({
            url: '/admin/pengembalian/sendNotifikasi',
            type: 'POST',
            data: {
                id_transaksi_peminjaman: $('#id_transaksi_peminjaman').val(),
                pesan: $('#pesan').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                $('#notifikasi').modal('hide');
                toastr['success']('Notifikasi berhasil dikirim', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
                $('.dt-responsive').DataTable().ajax.reload();
            },
            error: function (data) {
                console.log(data);
                toastr['error'](data.responseJSON.message, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
            }
        });
    }

    function acceptPengembalian() {
        var id_transaksi_peminjaman = $('#id_transaksi_peminjaman').val();
        var denda = $('#denda').val();
        var tanggal_kembali = $('#tanggal_kembali').val();
        var status = $('#status').val();
        var keterangan = $('#keterangan').val();
        $.ajax({
            url: '/admin/pengembalian/acceptPengembalian',
            type: 'POST',
            data: {
                id_transaksi_peminjaman: id_transaksi_peminjaman,
                denda: denda,
                tanggal_kembali: tanggal_kembali,
                status: status,
                keterangan: keterangan,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                $('#diterima').modal('hide');
                toastr['success']('Pengembalian buku berhasil diterima', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
                $('.dt-responsive').DataTable().ajax.reload();
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
</script>
@endsection
