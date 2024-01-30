@extends('admin.slicing.index')

@section('title', 'Edit Buku')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-wizard.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('main-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/editors/quill/quill.bubble.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-quill-editor.css') }}">

@endsection

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.book').addClass('active');
    });
</script>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Buku</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/admin/book">Buku</a>
                                <li class="breadcrumb-item active">Edit Buku
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="content-body" enctype="multipart/form-data" id="form-edit-buku">
            @method('PUT')
            @csrf
            <section class="vertical-wizard">
                <div class="bs-stepper vertical vertical-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#detail-book-vertical" role="tab"
                            id="detail-book-vertical-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Detail Buku</span>
                                    <span class="bs-stepper-subtitle">Masukkan Detail Buku</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#more-info-vertical" role="tab" id="more-info-vertical-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Info Lengkap</span>
                                    <span class="bs-stepper-subtitle">Tambahkan Info Lengkap Buku</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#address-step-vertical" role="tab"
                            id="address-step-vertical-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Cover Buku</span>
                                    <span class="bs-stepper-subtitle">Tambahkan Cover Buku</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="detail-book-vertical" class="content" role="tabpanel"
                            aria-labelledby="detail-book-vertical-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Detail Buku</h5>
                                <small class="text-muted">Masukkan Detail Buku</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" id="judul" class="form-control" name="judul" placeholder="Machine Learning" value="{{ $buku->judul }}" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="penulis">Penulis</label>
                                    <input type="text" id="penulis" name="penulis" class="form-control" placeholder="John Doe" value="{{ $buku->penulis }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Gramedia" value="{{ $buku->penerbit }}" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="tahunTerbit">Tahun Terbit</label>
                                    <input type="date" name="tahun_terbit" id="tahunTerbit" class="form-control" value="{{ $buku->tahun_terbit }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-12">
                                    <label for="select2-multiple" class="form-label">Kategori</label>
                                    <select class="select2 form-select" name="kategori[]" id="select2-multiple" multiple>
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Sains">Sains</option>
                                        <option value="Ekonomi">Ekonomi</option>
                                        <option value="Agama">Agama</option>
                                        <option value="Hukum">Hukum</option>
                                        <option value="Sosial">Sosial</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Psikologi">Psikologi</option>
                                        <option value="Politik">Politik</option>
                                        <option value="Sejarah">Sejarah</option>
                                        <option value="Seni">Seni</option>
                                        <option value="Budaya">Budaya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="more-info-vertical" class="content" role="tabpanel"
                            aria-labelledby="more-info-vertical-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Info Lengkap</h5>
                                <small>Tambahkan Info Lengkap Buku</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="isbn">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" class="form-control" placeholder="978-3-16-148410-0" value="{{ $buku->isbn }}" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="jmlBuku">Jumlah Buku</label>
                                    <input type="number" id="jmlBuku" name="jumlah_buku" class="form-control" placeholder="10" value="{{ $buku->jumlah_buku }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="rak">Rak</label>
                                    <input type="text" id="rak" name="rak" class="form-control" placeholder="Lantai 1, Rak 1" value="{{ $buku->rak }}" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="jmlHalaman">Jumlah Halaman</label>
                                    <input type="number" id="jmlHalaman" name="jumlah_halaman" class="form-control" placeholder="100" value="{{ $buku->jumlah_halaman }}" />
                                </div>
                            </div>
                            <div class="mb-1 col-md-12">
                                <label for="tentang">Tentang Buku</label>
                                <div id="tentang_area">
                                    <div class="editor" style="height: 300px;">
                                        {!! $buku->tentang !!}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="address-step-vertical" class="content" role="tabpanel"
                            aria-labelledby="address-step-vertical-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Cover Buku</h5>
                                <small>Tambahkan Cover Buku</small>
                            </div>
                            <img src="{{ asset('storage/'.$buku->cover) }}" alt="Cover Buku" width="250px">
                            <div class="row">
                                <div class="mb-5 col-md-12">
                                    <label for="cover">Cover Buku</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="cover" id="cover" />
                                    </div>
                                </div>
                            </div>
                            <textarea class="d-none" name="tentang" id="tentang" value="{{ $buku->tentang }}"></textarea>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                </button>
                                <button type="button" class="btn btn-success btn-submit">Submit</button>
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
<script src="{{ asset('main-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('main-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
<script src="{{ asset('main-assets/js/scripts/forms/form-quill-editor.js') }}"></script>
<script>
$(document).ready(function () {
    const bookData = <?php echo json_encode($buku); ?>;
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
            if ($("#tentang_area .ql-editor").html() == '<p><br></p>') {
                $("#tentang").val('');
            }else if ($("#tentang_area .ql-editor").html() != '{{ $buku->tentang }}') {
                $("#tentang").val($("#tentang_area .ql-editor").html());
            }
            $.ajax({
                url: "{{ route('admin.book.update', $buku->isbn) }}",
                type: "POST",
                data: new FormData($('#form-edit-buku')[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    toastr['success']('Buku berhasil diubah', {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                    setTimeout(function () {
                        window.location.href = "/admin/book";
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
        });
    }
    $('#select2-multiple').select2({
        tags: true,
        tokenSeparators: [',', ' '],
    }).val(bookData.kategori.split(',')).trigger('change');

    var currentValues = bookData.kategori.split(',');
    var newValues = [];

    currentValues.forEach(function (value) {
        if ($('#select2-multiple').find("option[value='" + value + "']").length === 0) {
            newValues.push(value);
        }
    });

    newValues.forEach(function (newValue) {
        var option = new Option(newValue, newValue, true, true);

        $('#select2-multiple').append(option).trigger('change');
    });
});
</script>
@endsection
