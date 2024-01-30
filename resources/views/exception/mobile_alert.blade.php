<!DOCTYPE html>
<html class="loading dark-layout" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>E - Perlib | Not Authorized</title>
    <link rel="apple-touch-icon" href="{{ asset('main-assets/images/ico/apple-icon-120.png') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/pages/page-misc.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('main-assets/css/style-custom.css') }}">

    <script>
        if (/Mobi/.test(navigator.userAgent)) {
            window.location.href = "/";
        }
    </script>

</head>


<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="misc-wrapper"><a class="brand-logo" href="/">
                        <img src="{{ asset('main-assets/images/icons/perlib.png') }}" alt="logo" height="28"/>
                        <h2 class="brand-text text-primary ms-1">UAJY Library</h2>
                    </a>
                    <div class="misc-inner p-2 p-sm-3">
                        <div class="w-100 text-center">
                            <h2 class="mb-1">You are not authorized open with desktop! 🔐</h2>
                            <p class="mb-2">
                                You don't have permission to access this page with desktop. Please open with mobile device.
                            </p><img class="img-fluid" src="{{ asset('main-assets/images/pages/not-authorized.svg') }}" alt="Not authorized page" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('main-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('main-assets/js/core/app.js') }}"></script>

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
<!-- END: Body-->

</html>