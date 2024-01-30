@extends('admin.slicing.index')

@section('title', 'Buku')

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.book').addClass('active');
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
                        <h2 class="content-header-title float-start mb-0">Daftar Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active">Daftar Buku
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
                                <a href="/admin/book/add"
                                    class="btn btn-primary">
                                    <i data-feather="plus"></i>
                                    Tambah Buku</a>
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
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>ISBN</th>
                                            <th>Jumlah Buku</th>
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
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var dt_responsive = $('.dt-responsive').DataTable({
            ajax: '/admin/book/getDataBuku',
            columns: [{
                    data: 'responsive_id'
                },
                {
                    data: 'cover'
                },
                {
                    data: 'judul'
                },
                {
                    data: 'penulis'
                },
                {
                    data: 'penerbit'
                },
                {
                    data: 'isbn'
                },
                {
                    data: 'jumlah_buku'
                },
                {
                    data: 'aksi',
                    render: function (data, type, row) {
                        return "<a href='/admin/book/edit/"+ row.isbn +"' class='btn btn-warning'>Edit</a> <button onclick='onDelete("+row.isbn+")' class='btn btn-danger'>Hapus</button>"
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
                            return 'Details of ' + data['judul'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' ?
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
    function onDelete(isbn) {
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
                url: '/admin/book/delete/' + isbn,
                type: 'DELETE',
                data: {
                    'isbn': isbn,
                    '_token': '{{ csrf_token() }}'
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
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan! Silahkan coba lagi.',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
            }
        });
    }
</script>
@endsection
