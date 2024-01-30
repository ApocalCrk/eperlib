<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>E - Perlib | Login Admin</title>
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
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <a class="brand-logo" href="/">
                            <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="logo" height="28">
                            <h2 class="brand-text text-primary ms-1">UAJY Library</h2>
                        </a>
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('main-assets/images/pages/login-v2.svg') }}" alt="Login V2" /></div>
                        </div>
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1"> Welcome to E-Perlib! 👋</h2>
                                <p class="card-text mb-2"> Silahkan login untuk melanjutkan.
                                <br>
                                @if(session('error'))
                                    <b class="text-danger">{{ session('error') }}</b>
                                @endif
                                </p>
                                <form class="auth-login-form mt-2" action="/admin/login" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="login-username">Username</label>
                                        <input class="form-control" id="login-username" type="text" name="username" placeholder="Masukkan Username" aria-describedby="login-username" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="Masukkan Password" aria-describedby="password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="4">Sign in</button>
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
</body>

</html>