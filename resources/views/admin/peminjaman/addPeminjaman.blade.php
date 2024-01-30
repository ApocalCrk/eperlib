@extends('admin.slicing.index')

@section('title', 'Tambah Peminjaman')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-wizard.css') }}">
@endsection

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.peminjaman').addClass('active');
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
                        <h2 class="content-header-title float-start mb-0"> Peminjaman Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active"> Peminjaman Buku
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="content-body" id="form-add-peminjaman">
            @csrf
            <section class="vertical-wizard">
                <div class="bs-stepper vertical vertical-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#more-info-vertical" role="tab" id="more-info-vertical-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Detail Peminjaman</span>
                                    <span class="bs-stepper-subtitle">Masukkan Detail Peminjaman</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#detail-book-vertical" role="tab"
                            id="detail-book-vertical-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Detail Buku</span>
                                    <span class="bs-stepper-subtitle">Masukkan Detail Buku</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                    <div id="more-info-vertical" class="content" role="tabpanel"
                            aria-labelledby="more-info-vertical-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Detail Peminjaman</h5>
                                <small>Isi Detail Peminjaman</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="npm">NPM</label>
                                    <input type="number" id="npm" class="form-control" name="npm" placeholder="21071111" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control" name="nama" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" readonly />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="program_studi">Program Studi</label>
                                    <input type="text" id="program_studi" class="form-control" name="program_studi" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" id="tanggal_pinjam" class="form-control" name="tanggal_pinjam" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" id="tanggal_kembali" class="form-control" name="tanggal_kembali" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="detail-book-vertical" class="content" role="tabpanel"
                            aria-labelledby="detail-book-vertical-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Detail Buku</h5>
                                <small class="text-muted">Masukkan Detail Buku</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="isbn">ISBN</label>
                                    <input type="text" id="isbn" class="form-control" name="isbn" placeholder="978-3-16-148410-0" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" id="judul" class="form-control" name="judul" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="penulis">Penulis</label>
                                    <input type="text" id="penulis" class="form-control" name="penulis" readonly/>
                                </div>
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="penerbit">Penerbit</label>
                                    <input type="text" id="penerbit" class="form-control" name="penerbit" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-4 mb-1 mb-5">
                                    <div class="col-md-12">
                                        <label for="cover">Cover Buku</label>
                                    </div>
                                    <style>
                                        .cover {
                                            width: 100%;
                                            height: 100%;
                                        }
                                    </style>
                                    <div id="image-cover">

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="button" class="btn btn-success btn-submit">
                                    <span class="align-middle d-sm-inline-block d-none">Submit</span>
                                    <i data-feather="check" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('main-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#npm").on('keyup', function (event) {
            var npm = $(this).val();
            if(event.keyCode == 8){
                $('#nama').val('');
                $('#email').val('');
                $('#program_studi').val('');
            }
            $.getJSON('/admin/peminjaman/getDataMember',
                function (data) {
                var foundUser = null;
                $.each(data.data, function (index, user) {
                    if (npm == user.npm) {
                        foundUser = user;
                        return false;
                    }
                });
                if (foundUser) {
                    $('#nama').val(foundUser.nama);
                    $('#email').val(foundUser.email);
                    $('#program_studi').val(foundUser.program_studi);
                } else {
                    $('#nama').val('');
                    $('#email').val('');
                    $('#program_studi').val('');
                }
            });
        });

        var today = new Date();
        var today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var days5 = new Date();
        days5.setDate(days5.getDate() + 5);
        $('#tanggal_kembali').attr('min', today);
        $('#tanggal_kembali').attr('max', days5.getFullYear() + '-' + (days5.getMonth() + 1) + '-' + days5.getDate());

        $("#isbn").on('keyup', function (event) {
            var isbn = $(this).val();
            if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 18 || event.keyCode == 17){
                $('#judul').val('');
                $('#penulis').val('');
                $('#penerbit').val('');
                $('#image-cover').empty();
            }
            $.getJSON('/admin/peminjaman/getDataBuku',
                function (data) {
                var foundBook = null;
                $.each(data.data, function (index, book) {
                    if (isbn == book.isbn) {
                        foundBook = book;
                        return false;
                    }
                });

                if (foundBook) {
                    $('#judul').val(foundBook.judul);
                    $('#penulis').val(foundBook.penulis);
                    $('#penerbit').val(foundBook.penerbit);
                    if(!$('#image-cover').children().length > 0){
                        $('#image-cover').append(foundBook.cover)
                    }
                } else {
                    $('#judul').val('');
                    $('#penulis').val('');
                    $('#penerbit').val('');
                    $('#image-cover').empty();
                }
            });
        });

        var verticalWizard = document.querySelector('.vertical-wizard-example');
        if (typeof verticalWizard !== undefined && verticalWizard !== null) {
            var verticalStepper = new Stepper(verticalWizard, {
            linear: false
            });
            $(verticalWizard)
            .find('.btn-next')
            .on('click', function () {
                verticalStepper.next();
            });
            $(verticalWizard)
            .find('.btn-prev')
            .on('click', function () {
                verticalStepper.previous();
            });

            $(verticalWizard)
            .find('.btn-submit')
            .on('click', function () {
                $.ajax({
                    url: '/admin/peminjaman/store',
                    type: 'POST',
                    data: new FormData($('#form-add-peminjaman')[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        toastr['success']('Data Peminjaman Berhasil Ditambahkan!', {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                        setTimeout(function () {
                            window.location.href = "/admin/peminjaman";
                        }, 1000);
                    },
                    error: function (data) {
                        toastr['error'](data.responseJSON.message, {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    }
                })
            });
        }

    });
</script>
@endsection
