@extends('admin.slicing.index')

@section('title', 'Ruangan')

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.ruangan').addClass('active');
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
                        <h2 class="content-header-title float-start mb-0">Ruangan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active">Ruangan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="responsive-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRuangan">
                                    <i data-feather="plus"></i>
                                    Tambah Ruangan</a>
                            </div>
                            <div class="card-datatable">
                                <style>
                                    tr {
                                        text-align: center;
                                    }

                                </style>
                                <table class="dt-responsive table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Ruangan</th>
                                            <th>Aksi</th>
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

<div class="modal fade" id="addRuangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Tambah Ruangan</h1>
                    <p>Tambah data ruangan</p>
                </div>
                <form id="tambah-ruangan" class="row gy-1 pt-75">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="kode_ruangan">Kode Ruangan</label>
                        <input type="text" id="kode_ruangan" class="form-control" name="kode_ruangan" placeholder="Kode Ruangan" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" id="nama_ruangan" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" />
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100" onclick="tambahRuangan()">
                            <i data-feather="plus" class="me-25"></i>
                            <span>Tambah</span>
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

<div class="modal fade" id="ubahRuangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Ubah Ruangan</h1>
                    <p>Ubah data ruangan</p>
                </div>
                <form id="edit-ruangan" class="row gy-1 pt-75">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="kode_ruangan_temp" name="kode_ruangan_temp" />
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="kode_ruangan_edit">Kode Ruangan</label>
                        <input type="text" id="kode_ruangan_edit" class="form-control" name="kode_ruangan_edit" placeholder="Kode Ruangan" value="R001" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="nama_ruangan_edit">Nama Ruangan</label>
                        <input type="text" id="nama_ruangan_edit" class="form-control" name="nama_ruangan_edit" placeholder="Nama Ruangan" value="Discussion Room 1" />
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100" onclick="editRuangan()">
                            <i data-feather="edit" class="me-25"></i>
                            <span>Ubah</span>
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
            ajax: '/admin/ruangan/getDataRuangan',
            columns: [{
                    data: 'responsive_id'
                },
                {
                    data: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'kode_ruangan'
                },
                {
                    data: 'nama_ruangan'
                },
                {
                    data: 'aksi',
                    render: function (data, type, row, meta) {
                        return `<a class='btn btn-sm btn-warning' onclick='onEdit("${row.kode_ruangan}", "${row.nama_ruangan}")'>Ubah</a>
                        <a onclick='onDelete("${row.kode_ruangan}")' class='btn btn-sm btn-danger'>Hapus</a>`;
                    }
                }
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
                            return 'Details of ' + data['nama_ruangan'];
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
    })

    function tambahRuangan(){
        $.ajax({
            url: '/admin/ruangan/tambahRuangan',
            type: 'POST',
            data: $('#tambah-ruangan').serialize(),
            success: function (response){
                toastr['success']('Ruangan berhasil ditambahkan', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
                $('#addRuangan').modal('hide')
                $('.dt-responsive').DataTable().ajax.reload()
            },
            error: function (xhr){
                toastr['error'](xhr.responseJSON.message, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
            }
        })
    }

    function onEdit(kode, nama){
        $('#ubahRuangan').modal('show');
        $('#kode_ruangan_temp').val(kode);
        $('#kode_ruangan_edit').val(kode);
        $('#nama_ruangan_edit').val(nama);
    }

    function editRuangan(){
        $.ajax({
            url: '/admin/ruangan/editRuangan',
            type: 'POST',
            data: $('#edit-ruangan').serialize(),
            success: function (response){
                toastr['success']('Ruangan berhasil diubah', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
                $('#ubahRuangan').modal('hide')
                $('.dt-responsive').DataTable().ajax.reload()
            },
            error: function (xhr){
                toastr['error'](xhr.responseJSON.message, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
            }
        })
    }

    function onDelete(kode_ruangan){
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Kamu tidak akan bisa mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '/admin/ruangan/deleteRuangan/'+kode_ruangan,
                    type: 'POST',
                    method: 'DELETE',
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function (response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: 'Data ruangan berhasil dihapus.'
                        });
                        $('.dt-responsive').DataTable().ajax.reload()
                    },
                    error: function (xhr){
                        toastr['error'](xhr.responseJSON.message, {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    }
                })
            }
        });
    }

</script>
@endsection
