@extends('user.slicing.index')

@section('title', 'Peminjaman')

@section('content')
    <script src="{{ asset('main-assets/js/core/html5-qrcode.min.js') }}"></script>
    <script>
        function docReady(fn) {
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            function onScanSuccess(decodedText, decodedResult) {
                $.ajax({
                    url: '/user/checkBuku/' + decodedText,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.status == 'success') {
                            var isbn = decodedText;
                            var url = '/user/peminjaman_buku/detail';
                            window.location.href = url + '/' + isbn;
                        } else {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": true,
                                "progressBar": true,
                                "positionClass": "toast-bottom-full-width",
                                "preventDuplicates": true,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "3000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "slideDown",
                                "hideMethod": "slideUp"
                            }
                            toastr["error"](response.message);
                        }
                    }
                });
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA] });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div id="qr-reader" class="col-md-4"></div>
            <div id="qr-reader-results"></div>
            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-1">
                <div class="card">
                    <div class="card-body">
                        <a href="/user/book" class="btn btn-success w-100">
                            <i data-feather="book" class="me-25"></i>
                            <span>Cari Buku</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
