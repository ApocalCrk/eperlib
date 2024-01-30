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
                                <div class="left">
                                    <h4 class="card-title">Data Pengembalian</h4>
                                </div>  
                                <div class="right">
                                    <a href="/admin/pengembalian/daftarPeminjaman"
                                        class="btn btn-primary">
                                        <i data-feather="clipboard"></i>
                                        Daftar Peminjaman</a>
                                    <a href="/admin/pengembalian/req"
                                        class="btn btn-primary">
                                        <i data-feather="clipboard"></i>
                                        Permintaan Pengembalian</a>
                                </div>
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
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var dt_responsive = $('.dt-responsive').DataTable({
            ajax: {
                url: '/admin/pengembalian/getDataPengembalian',
                type: 'GET',
                dataSrc: 'data'
            },
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
                        return `<a href="/admin/pengembalian/detail/${row.id_pengembalian}" class="btn btn-sm btn-primary">Detail</a>`;
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
</script>
@endsection
