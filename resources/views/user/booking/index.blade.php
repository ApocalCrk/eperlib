@extends('user.slicing.index')

@section('title', 'Peminjaman Ruangan')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Peminjaman Ruangan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Peminjaman Ruangan</a>
                                </li>
                            </ol>
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
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddRuangan"
                                        class="btn btn-primary">
                                        <i data-feather="edit"></i>
                                        Booking Ruangan</a>
                                </div>
                                <div class="card-datatable">
                                    <style>
                                        tr {
                                            text-align: center;
                                        }

                                        .dataTables_filter {
                                            float: left;
                                        }

                                    </style>
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th>Detail</th>
                                                <th>Ruangan</th>
                                                <th>NPM</th>
                                                <th>Nama Peminjam</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
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
</div>

<div class="modal fade" id="modalAddRuangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Peminjaman Ruangan</h1>
                    <p>Silahkan isi form berikut untuk melakukan peminjaman ruangan</p>
                </div>
                <form id="addBooking" class="row gy-1 pt-75" onsubmit="submitForm(event)">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="idTransaksiPeminjaman">Ruangan</label>
                        <select class="form-select" id="ruangan">
                            <option selected disabled>Silahkan pilih ruangan</option>
                            @foreach($ruangan as $item)
                            <option value="{{ $item->kode_ruangan }}">{{ $item->nama_ruangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="npm">NPM</label>
                        <input type="test" id="npm" name="npm" class="form-control" value="{{ Auth::user()->npm }}" disabled />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" min="{{ date('Y-m-d') }}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="waktu">Waktu</label>
                        <select class="form-select" id="waktu" disabled>
                            <option selected>Silahkan pilih Tanggal Peminjaman</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100" data-bs-dismiss="modal">
                            <i data-feather="send" class="me-25"></i>
                            <span>Kirim</span>
                        </button>
                    </div>
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x" class="me-25"></i>
                            <span>Kembali</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var dt_responsive;
    $(document).ready(function () {
        $('#ruangan').change(function () {
            var ruangan = $(this).val();
            var date = $('#tanggal').val();
            if (date) {
                fetchData(ruangan, date);
            } else {
                $('#waktu').prop('disabled', true).val('Silahkan pilih Tanggal Peminjaman');
            }
        });

        $('#tanggal').change(function() {
            var ruangan = $('#ruangan').val();
            var date = $(this).val();
            console.log(ruangan);
            if (date && ruangan != null) {
                fetchData(ruangan, date);
            } else {
                $('#waktu').prop('disabled', true).val('Silahkan pilih Tanggal Peminjaman');
            }
        });

        function fetchData(ruangan, date) {
            $.ajax({
                url: "/user/booking/checkRuangan/" + ruangan + "/" + date,
                type: "GET",
                success: function (data) {
                    var waktu = JSON.parse(data);
                    var html = "";
                    waktu.forEach(element => {
                        html += "<option value='" + element + "'>" + element + "</option>";
                    });
                    $('#waktu').prop('disabled', false);
                    $('#waktu').html(html);
                }
            });
        }

        dt_responsive = $('.dt-responsive').DataTable({
            ordering: false,
            lengthChange: false,
            ajax: '/user/booking/getDataBooking',
            columns: [{
                    data: 'responsive_id'
                },
                {
                    data: 'nama_ruangan'
                },
                {
                    data: 'npm'
                },
                {
                    data: 'nama_peminjam'
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'waktu'
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
                            return col.title !== '' ?
                                '<tr data-dt-row="' +
                                col.rowIdx +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
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
    function submitForm(e) {
        e.preventDefault();
        var ruangan = $('#ruangan').val();
        var npm = $('#npm').val();
        var tanggal = $('#tanggal').val();
        var waktu = $('#waktu').val();
        $.ajax({
            url: "/user/booking/bookingRuangan",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "kode_ruangan": ruangan,
                "npm": npm,
                "tanggal": tanggal,
                "waktu": waktu
            },
            success: function (data) {
                console.log(data);
                if (data == "success") {
                    toastr['success']('Silahkan cek kembali pada tabel data peminjaman!', 'Ruangan Berhasil Dipinjam', {
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 3000
                    });
                    dt_responsive.ajax.reload();
                    $('#addBooking').trigger("reset");
                } else {
                    toastr['error']('Silahkan cek kembali pada tabel data peminjaman!', 'Ruangan Gagal Dipinjam', {
                        showMethod: 'fadeIn',
                        hideMethod: 'fadeOut',
                        timeOut: 3000
                    });
                }
            },
            error: function (data) {
                console.log(data);
                toastr['error']('Silahkan cek kembali form data peminjaman!', 'Ruangan Gagal Dipinjam', {
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 3000
                });
            }
        });
    }
</script>
@endsection
