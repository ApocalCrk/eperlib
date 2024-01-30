@extends('admin.slicing.index')

@section('title', 'Edit Pengguna')

@section('content')
<script>
    $(document).ready(function () {
        $('.dashboard').removeClass('active');
        $('.users').addClass('active');
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
                        <h2 class="content-header-title float-start mb-0">Edit Pengguna</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Pengguna
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" id="form-edit-user">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="npm">NPM</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="credit-card"></i></span>
                                            <input type="number" id="npm" class="form-control" name="npm"
                                                value="{{ $member->npm }}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="nama">Nama</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                            <input type="nama" id="nama" class="form-control" name="nama"
                                                value="{{ $member->nama }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="mail"></i></span>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ $member->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="fakultas">Fakultas</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="book"></i></span>
                                            <input type="fakultas" id="fakultas" class="form-control" name="fakultas"
                                                value="{{ $member->fakultas }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="prodi">Program Studi</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="database"></i></span>
                                            <input type="prodi" id="prodi" class="form-control" name="prodi"
                                                value="{{ $member->program_studi }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="/admin/users" class="btn btn-outline-secondary me-1"><i
                                            data-feather="arrow-left" class="me-25"></i><span>Kembali</span></a>
                                    <button type="button" onclick="save('{{$member->npm}}')" class="btn btn-primary me-1"><i data-feather="save"
                                            class="me-25"></i><span>Simpan</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function save(npm) {
        $.ajax({
            url: "{{ route('admin.users.update', $member->npm) }}",
            type: "POST",
            data: new FormData($('#form-edit-user')[0]),
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    toastr["success"](response.message, {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                    setTimeout(function () {
                        window.location.href = '/admin/users';
                    }, 1000);
                } else {
                    console.log(response);
                    toastr["error"](response.message, {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                toastr["error"](xhr.responseJSON.message, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true
                });
            }
        });
    }
</script>
