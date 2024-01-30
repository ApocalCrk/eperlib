<!DOCTYPE html>
<html class="loading" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>E - Perlib | Login User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('main-assets/images/icons/perlib.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/style-custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/plugins/extensions/ext-component-toastr.css') }}">

    <script>
        if (!/Mobi/.test(navigator.userAgent)) {
            window.location.href = "mobile-only";
            console.log("This site is accessible only on mobile devices.");
        }
    </script>

</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="brand-logo">
                                    <img src="{{ asset('main-assets/images/icons/perlib.png') }}" height="40" width="auto" alt="">
                                    <h2 class="brand-text text-primary ms-1" style="margin-top: 10px">UAJY Library</h2>
                                </a>

                                <h4 class="card-title mb-1">Selamat Datang di UAJY Library</h4>
                                <p class="card-text mb-2">Silahkan login dengan npm dan password untuk mengakses fitur UAJY Library</p>
                                <form class="auth-login-form mt-2" id="login-form">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">NPM</label>
                                        <input type="text" class="form-control" id="login-npm" name="npm" placeholder="210711111" aria-describedby="login-npm" tabindex="1" autofocus />
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="············" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" tabindex="4" onclick="login()">Login</button>
                                </form>
                                <form class="auth-login-form mt-2 d-none" id="register-form">
                                    @csrf
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Create Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="create_password" name="create_password" tabindex="2" placeholder="············" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" tabindex="4" onclick="register()">Register</button>
                                </form>
                                <form class="auth-login-form mt-2 d-none" id="verifikasi-email">
                                    <p class="card-text mb-2">Silahkan cek email anda untuk verifikasi akun</p>
                                    <button type="button" class="btn btn-primary w-100" tabindex="4" onclick="kirimUlangKode()">Kirim Ulang Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('main-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('main-assets/js/scripts/pages/auth-login.js') }}"></script>
    <script src="{{ asset('main-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        function login() {
            var npm = $('#login-npm').val();
            var password = $('#password').val();
            $.ajax({
                url: "{{ route('login_user') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    npm: npm,
                    password: password
                },
                success: function(response) {
                    if (response.status == 'success' && response.type == 'registered'){
                        window.location.href = "{{ route('dashboard') }}";
                    } else if (response.status == 'success' && response.type == 'unregistered') {
                        $('#login-form').addClass('d-none');
                        $('#register-form').removeClass('d-none');
                    } else if (response.type == 'password' && response.status == 'error') {
                        toastr.error(response.message);
                        $('#login-form').addClass('d-none');
                        $('#register-form').removeClass('d-none');
                    } else if (response.type == 'verifikasi' && response.status == 'error') {
                        toastr.error(response.message);
                        $('#login-form').addClass('d-none');
                        $('#verifikasi-email').removeClass('d-none');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message);
                }
            });
        }

        function register() {
            var npm = $('#login-npm').val();
            var password = $('#create_password').val();
            $.ajax({
                url: "{{ route('register_user') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    npm: npm,
                    password: password
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#register-form').addClass('d-none');
                        $('#verifikasi-email').removeClass('d-none');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message);
                }
            });
        }

        function kirimUlangKode() {
            var npm = $('#login-npm').val();
            $.ajax({
                url: "{{ route('kirim_ulang_email') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    npm: npm
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    toastr.error(response.message);
                }
            });
        }
    </script>
</body>

</html>