@extends('admin.slicing.index')

@section('title', 'Edit Admin')

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
                        <h2 class="content-header-title float-start mb-0">Edit Admin</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Halaman Utama</a>
                                </li>
                                <li class="breadcrumb-item">Admin
                                </li>
                                <li class="breadcrumb-item active">Edit Admin
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
                        <form class="form form-vertical" id="editAdmin">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="nama">Nama</label>
                                        <div class="input-group input-group-merge nama-group">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan nama lengkap" value="{{ $admin->nama }}" />
                                        </div>
                                        <div class="invalid-feedback" id="error-nama"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="email">Email</label>
                                        <div class="input-group input-group-merge email-group">
                                            <span class="input-group-text"><i data-feather="mail"></i></span>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email" value="{{ $admin->email }}" />
                                        </div>
                                        <div class="invalid-feedback" id="error-email"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="username">Username</label>
                                        <div class="input-group input-group-merge username-group">
                                            <span class="input-group-text"><i data-feather="key"></i></span>
                                            <input type="username" id="username" class="form-control" name="username" placeholder="Masukkan username" value="{{ $admin->username }}" />
                                        </div>
                                        <div class="invalid-feedback" id="error-username"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="password">Password <small>(Kosongkan jika tidak ingin
                                            mengubah password)</small></label>
                                        <div class="input-group input-group-merge password-group">
                                            <span class="input-group-text"><i data-feather="lock"></i></span>
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password" />
                                        </div>
                                        <div class="invalid-feedback" id="error-password"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="label-form mb-1" for="no_hp">No HP</label>
                                        <div class="input-group input-group-merge no_hp-group">
                                            <span class="input-group-text"><i data-feather="phone"></i></span>
                                            <input type="number" id="no_hp" class="form-control" name="no_hp" placeholder="Masukkan nomor HP" value="{{ $admin->no_hp }}" />
                                        </div>
                                        <div class="invalid-feedback" id="error-no_hp"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="/admin/admin-list" class="btn btn-outline-secondary me-1"><i
                                            data-feather="arrow-left" class="me-25"></i><span>Kembali</span></a>
                                    <button type="button" onclick="edit()" class="btn btn-primary me-1"><i data-feather="save"
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
    function edit() {
        var nama = $('#nama').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var no_hp = $('#no_hp').val();
        $.ajax({
            url: '/admin/admin-list/update/{{ $admin->id_admin }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "_method": "PUT",
                nama: nama,
                email: email,
                username: username,
                password: password,
                no_hp: no_hp
            },
            success: function (data) {
                if (data.errors) {
                    if (data.errors.nama) {
                        $('#nama').addClass('is-invalid');
                        $('.nama-group').addClass('is-invalid');
                        $('#error-nama').show();
                        $('#error-nama').html(data.errors.nama);
                    }else{
                        $('#nama').removeClass('is-invalid').addClass('is-valid');
                        $('.nama-group').removeClass('is-invalid').addClass('is-valid');
                        $('#error-nama').hide();
                    }
                    if (data.errors.email) {
                        $('#email').addClass('is-invalid');
                        $('.email-group').addClass('is-invalid');
                        $('#error-email').show();
                        $('#error-email').html(data.errors.email);
                    }else{
                        $('#email').removeClass('is-invalid').addClass('is-valid');
                        $('.email-group').removeClass('is-invalid').addClass('is-valid');
                        $('#error-email').hide();
                    }
                    if (data.errors.username){
                        $('#username').addClass('is-invalid');
                        $('.username-group').addClass('is-invalid');
                        $('#error-username').show();
                        $('#error-username').html(data.errors.username);
                    }else{
                        $('#username').removeClass('is-invalid').addClass('is-valid');;
                        $('.username-group').removeClass('is-invalid').addClass('is-valid');;
                        $('#error-username').hide();
                    }
                    if (data.errors.password){
                        $('#password').addClass('is-invalid');
                        $('.password-group').addClass('is-invalid');
                        $('#error-password').show();
                        $('#error-password').html(data.errors.password);
                    }else{
                        $('#password').removeClass('is-invalid');
                        $('.password-group').removeClass('is-invalid');
                        $('#error-password').hide();
                    }
                    if (data.errors.no_hp){
                        $('#no_hp').addClass('is-invalid');
                        $('.no_hp-group').addClass('is-invalid');
                        $('#error-no_hp').show();
                        $('#error-no_hp').html(data.errors.no_hp);
                    }else{
                        $('#no_hp').removeClass('is-invalid').addClass('is-valid');;
                        $('.no_hp-group').removeClass('is-invalid').addClass('is-valid');;
                        $('#error-no_hp').hide();
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function () {
                        window.location.href = "/admin/admin-list";
                    }, 1000);
                }
            }
        });
    }
</script>
@endsection
