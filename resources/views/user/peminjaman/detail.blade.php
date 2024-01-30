@extends('user.slicing.index')

@section('title', 'Detail Peminjam')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-wizard.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/extensions/sweetalert2.min.css') }}"> -->
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
        <div class="content-body">
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
                        <div class="step" data-target="#detail-book-vertical" role="tab" id="detail-book-vertical-trigger">
                            <button type="button" class="step-trigger" style="cursor: not-allowed;pointer-events: none;">
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
                                    <input type="number" id="npm" class="form-control" value="{{ Auth::user()->npm }}" readonly/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control" value="{{ Auth::user()->nama }}" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="prodi">Program Studi</label>
                                    <input type="text" id="prodi" class="form-control" value="{{ Auth::user()->program_studi }}" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="tglpinjam">Tanggal Pinjam</label>
                                    <input type="date" id="tglpinjam" class="form-control" readonly/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="tglKembali">Tanggal Kembali</label>
                                    <input type="date" id="tglKembali" class="form-control"  />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button class="btn btn-primary btn-next">
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
                                    <input type="text" id="isbn" class="form-control" value="{{ $buku->isbn }}" readonly/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" id="judul" class="form-control" value="{{ $buku->judul }}" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="penulis">Penulis</label>
                                    <input type="text" id="penulis" class="form-control" value="{{ $buku->penulis }}" readonly/>
                                </div>
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="penerbit">Penerbit</label>
                                    <input type="text" id="penerbit" class="form-control" value="{{ $buku->penerbit }}" readonly/>
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
                                        <img src="{{ asset($buku->cover) }}" class="cover" alt="Cover Buku">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="submit" class="btn btn-success btn-submit">
                                    <span class="align-middle d-sm-inline-block d-none">Submit</span>
                                    <i data-feather="check" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('main-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- <script src="{{ asset('main-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script> -->
<script>
    $(document).ready(function() {
        var today = new Date();
        var today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var days5 = new Date();
        days5.setDate(days5.getDate() + 5);
        $('#tglpinjam').val(today);
        today = new Date(today);
        today.setDate(today.getDate() + 1);
        today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        $('#tglKembali').attr('min', today);
        $('#tglKembali').attr('max', days5.getFullYear() + '-' + (days5.getMonth() + 1) + '-' + days5.getDate());

        var verticalWizard = document.querySelector('.vertical-wizard-example');
        if (typeof verticalWizard !== undefined && verticalWizard !== null) {
            var verticalStepper = new Stepper(verticalWizard, {
            linear: false
            });
            $(verticalWizard)
            .find('.btn-next')
            .on('click', function () {
                var tglKembali = $('#tglKembali').val();
                if (tglKembali == '') {
                    toastr['error']('Tanggal kembali tidak boleh kosong!', 'Error!', {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                } else {
                    verticalStepper.next();
                }
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
                    url: '/user/peminjaman_buku/addPinjaman',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        isbn: $('#isbn').val(),
                        tanggal_pinjam: $('#tglpinjam').val(),
                        tanggal_kembali: $('#tglKembali').val()
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            toastr['success'](response.message, 'Success!', {
                                closeButton: true,
                                tapToDismiss: false
                            });
                            $('.btn-submit').attr('disabled', true);
                            setTimeout(function () {
                                window.location.href = '/user/peminjaman_buku';
                            }, 2000);
                        } else {
                            toastr['error'](response.message, 'Error!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true
                            });
                        }
                    }
                });
            });
        }
    });
</script>
@endsection