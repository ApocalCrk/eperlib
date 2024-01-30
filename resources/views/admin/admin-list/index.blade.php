@extends('admin.slicing.index')

@section('title', 'Daftar Admin')

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.admin').addClass('active');
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
                    <h2 class="content-header-title float-start mb-0">Daftar Admin</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item active">Daftar Admin
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
                            <a href="/admin/admin-list/add"
                                class="btn btn-primary">
                                <i data-feather="plus"></i>
                                Tambah Admin</a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>No HP</th>
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



<script>
    $(document).ready(function () {
        var dt_responsive = $('.dt-responsive').DataTable({
            ajax: '/admin/admin-list/getDataAdmin',
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
                    data: 'nama'
                },
                {
                    data: 'email'
                },
                {
                    data: 'username'
                },
                {
                    data: 'no_hp'
                },
                {
                    data: 'aksi',
                    render: function(data, type, row, meta){
                        return `<a href='/admin/admin-list/edit/${row.id_admin}' class='btn btn-sm btn-warning'>Edit</a>
                        <a onclick='onDelete(${row.id_admin})' class='btn btn-sm btn-danger'>Hapus</a>`
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
                            return 'Details of ' + data['npm'];
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

    function onDelete(id) {
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
                    url: '/admin/admin-list/delete/' + id,
                    type: 'DELETE',
                    data: {
                    _token: "{{ csrf_token() }}"
                    },
                    success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Terhapus!',
                        text: 'Data telah dihapus.',
                        customClass: {
                        confirmButton: 'btn btn-success'
                        }
                    });
                    $('.dt-responsive').DataTable().ajax.reload();
                    }
                });
            }
        });
    }
</script>
@endsection
