<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E - Perlib | UAJY Library</title>
  <link rel="icon" href="{{ asset('main-assets/images/icons/perlib.png') }}" type="image/x-icon" />
  <link rel="stylesheet" href="landing-assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="landing-assets/css/swiper.min.css" />
  <link rel="stylesheet" href="landing-assets/css/icofont.min.css" />
  <link rel="stylesheet" href="landing-assets/css/glightbox.css" />
  <link rel="stylesheet" href="landing-assets/css/margins-paddings.css" />
  <link rel="stylesheet" href="landing-assets/css/aos.css" />
  <link rel="stylesheet" href="landing-assets/css/style.css" />
</head>

<body>
  <div class="section-wrapper">
    <div id="preLoader"></div>
    <header class="header">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
                <div class="d-flex">
                    <img src="main-assets/images/icons/perlib.png" alt="Logo" style="width: 48px" />
                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul id="onepage-nav" class="navbar-nav menu ms-lg-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#rekomen">Rekomendasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#kontak">Kontak</a>
                </li>
                @if (Auth::guard('users')->check() || Auth::guard('admin')->check())
                <li class="nav-item">
                  @if(Auth::guard('admin')->check())
                  <a class="nav-link" href="/admin/dashboard">Admin Dashboard</a>
                  @else
                  <a class="nav-link" href="/user/dashboard">Dashboard</a>
                  @endif
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="/user/login">Login</a>
                </li>
                @endif
                <!-- <li class="nav-item">
                  <a class="nav-link" href="/user/register">Register</a>
                </li> -->
              </ul>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
              <span></span><span></span><span></span><span></span><span></span><span></span>
            </button>
          </nav>
        </div>
      </div>
    </header>

    <style>
      /* make vh-lg-100 */
      @media (min-width: 992px) {
        .vh-lg-100 {
          height: 100vh;
        }
      }
    </style>

    <section id="hero" class="hero hero__padding overflow-hidden position-relative bg-one vh-lg-100">
      <div class="circle x1"></div>
      <div class="circle x2"></div>
      <div class="circle x3"></div>
      <div class="circle x4"></div>
      <div class="circle x5"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7 col-lg-6 m-0px-b md-m-40px-b">
            <div class="hero__content position-relative">
              <h1 class="display-4 mb-4 text-capitalize" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="800">
                @if(isset($favoriteBook->judul))
                {{ $favoriteBook->judul }}
                @else
                {{ $favoriteBook->buku->judul }}
                @endif
              </h1>
              <p class="text-muted mb-5 fs-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="850">
                @if(isset($favoriteBook->tentang))
                {{ $favoriteBook->tentang }}
                @else
                {{ $favoriteBook->buku->tentang }}
                @endif
              </p>
              <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="950">
                <a onclick="window.location.href='/user/login'" class="smooth button button__primary me-3">
                  <span>Mulai Meminjam</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-5 offset-lg-1 text-center" data-aos="fade-up" data-aos-duration="1000"
            data-aos-delay="850">
            <div class="hero__images3">
              <img width="400" class="img-fluid" src="@if(isset($favoriteBook->cover)){{ $favoriteBook->cover }}@else{{ $favoriteBook->buku->cover }}@endif" alt="Image" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="benefits" class="achieve section-padding">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
            <div class="section-title-center text-center">
              <span data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">Kenapa Harus Ke Perpustaakan?</span>
              <h2 class="display-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                Apa saja yang akan kamu dapatkan di Perpustakaan
              </h2>
              <div class="section-divider divider-traingle" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="250"></div>
            </div>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-lg-6 mb-3 mb-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <div class="row">
              <div class="col-sm-12">
                <div class="achieve__image">
                  <img class="img-fluid" src="landing-assets/images/feature.jpg" alt="Achive Image"/>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="achieve__content">
              <div class="row">
                <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                  <div class="achieve__content__item h-100 translateEffect2">
                    <div class="achieve__icon m-20px-b">
                      <i class="icofont-ebook"></i>
                    </div>
                    <h3 class="m-15px-b">Experience</h3>
                    <p>
                      Kamu akan mendapatkan pengalaman baru yang dapat menambah wawasanmu.
                    </p>
                  </div>
                </div>
                <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                  <div class="achieve__content__item h-100 translateEffect2">
                    <div class="achieve__icon m-20px-b">
                      <i class="icofont-dice-multiple"></i>
                    </div>
                    <h3 class="m-15px-b">Motivation</h3>
                    <p>
                      Kamu akan mendapatkan motivasi baru untuk terus belajar dan berprestasi.
                    </p>
                  </div>
                </div>
                <div class="col-sm-6 mb-4 mb-sm-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                  <div class="achieve__content__item h-100 translateEffect2">
                    <div class="achieve__icon m-20px-b">
                      <i class="icofont-goal"></i>
                    </div>
                    <h3 class="m-15px-b">Goals</h3>
                    <p>
                      Kamu akan mendapatkan tujuan baru untuk masa depanmu.
                    </p>
                  </div>
                </div>
                <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                  <div class="achieve__content__item h-100 translateEffect2">
                    <div class="achieve__icon m-20px-b">
                      <i class="icofont-brand-target"></i>
                    </div>
                    <h3 class="m-15px-b">Vision</h3>
                    <p>
                      Kamu akan mendapatkan visi baru untuk menggapai masa depanmu.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="rekomen" class="section-padding bg-one">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
            <div class="section-title-center text-center">
              <span data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">Rekomendasi</span>
              <h2 class="display-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                Buku Rekomendasi Untuk Kamu
              </h2>
              <div class="section-divider divider-traingle" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="250"></div>
            </div>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center align-items-center" data-aos="fade-right"
            data-aos-duration="1000" data-aos-delay="200">
            <img src="{{ $recommendBook->cover }}" alt="image" class="img-fluid" style="width: 400px" />
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <div class="chapter-content">
              <h3 class="mb-4">{{ $recommendBook->judul }}</h3>
              <p class="first-letter">
                {{ $recommendBook->tentang }}
              </p>
              <br>
              <div class="chapter-detail">
                <div class="row">
                  <div class="col-6">
                    <div class="chapter-detail-item">
                      <h5>Penulis</h5>
                      <p>{{ $recommendBook->penulis }}</p>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="chapter-detail-item">
                      <h5>Penerbit</h5>
                      <p>{{ $recommendBook->penerbit }}</p>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="chapter-detail-item">
                      <h5>Tahun Terbit</h5>
                      <p>{{ \Carbon\Carbon::parse($recommendBook->tahun_terbit)->format('d F Y') }}</p>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="chapter-detail-item">
                      <h5>Jumlah Halaman</h5>
                      <p>{{ $recommendBook->jumlah_halaman }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-padding chapter-rekomen">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
            <div class="section-title-center text-center">
              <span data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">Paling Banyak Dibaca</span>
              <h2 class="display-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                Baca Preview Buku
              </h2>
              <div class="section-divider divider-traingle" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="250"></div>
            </div>
          </div>
        </div>
        <div class="row rekomen-row">
          <div class="col-12 p-80px-b">
            <div class="chapter-slider">
              <div class="swiper-wrapper align-items-center justify-content-center d-flex">
                @forelse($mostPinjam as $item)
                <div class="swiper-slide p-5px-lr translateEffect2" data-aos="fade-up" data-aos-duration="1000"
                  data-aos-delay="200">
                  <a href="{{ $item->buku->cover }}" class="glightbox2"
                    data-glightbox=" description: .custom-desc1; descPosition: right;">
                    <img class="chapter-img img-fluid" src="{{ $item->buku->cover }}" alt="Image" />
                  </a>
                  <div class="glightbox-desc custom-desc1">
                    <h3 class="mb-4 text-center">{{ $item->buku->judul }}</h3>
                    <p class="first-letter">
                      {{ $item->buku->tentang }}
                    </p>
                  </div>
                </div>
                @empty
                <div class="align-items-center justify-content-center d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                  <h3 class="text-center">Tidak ada buku yang tersedia</h3>
                </div>
                @endforelse
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer bg-one overflow-hidden" id="kontak">
      <div class="container">
        <div class="footer__topv2 m-50px-t m-50px-b">
          <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
              data-aos-delay="200">
              <div class="footer__topv2__about">
                <div class="logo">
                  <h1>UAJY Library</h1>
                </div>
                <div class="text">
                  <p>
                    UAJY Library adalah sebuah website yang menyediakan layanan peminjaman buku secara online untuk mahasiswa UAJY. 
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
              data-aos-delay="300">
              <div class="footer___topV2__contact">
                <div class="title">
                  <p>Kontak</p>
                </div>
                <ul class="info">
                  <li>
                    <i class="icofont-google-map"></i><a href="#">Jl. Babarasari No. 5-6 Yogyakarta 55281</a>
                  </li>
                  <li>
                    <i class="icofont-email"></i><a mailto="lib@uajy.ac.id">lib@uajy.ac.id</a>
                  </li>
                  <li>
                    <i class="icofont-phone"></i><a tel="+62 274 487711">Telp. +62 274 487711 ext. 4156</a>
                  </li>
                </ul>
                <ul class="social-icon">
                  <li>
                    <a href="#"><i class="icofont-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icofont-twitter"></i></a>
                  </li>
                  <li>
                    <a href="https://instagram.com/ferdyfrms" target="_blank"><i class="icofont-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icofont-brand-whatsapp"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
              <div class="footer___topV2__newsletter">
                <div class="title">
                  <p>Send Message</p>
                </div>
                <form id="form-kirim-masukan">
                    @csrf
                    <div class="aos-init aos-animate">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="aos-init aos-animate">
                        <textarea class="form-control" placeholder="Pesan" aria-label="Message" aria-describedby="button-addon2" name="pesan"></textarea>
                    </div>
                    <button type="button" class="button button__primary mt-3" onclick="kirim_masukan()">
                        <span>Kirim</span>
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="footer__copyright m-20px-t m-20px-b">
          <div class="row">
            <div class="col-12">
              <p class="m-0 text-center">
                All Rights Reserved © {{ date('Y') }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreenModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header border-0">
            <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
          </div>
          <div class="modal-body d-flex align-items-center justify-content-center">
            <div class="row">
              <div class="text-center p-3">
                <a onclick="$('html, body').animate({scrollTop: $('#hero').offset().top}, 1000);$('#fullscreenModal').modal('hide');">Home</a>
              </div>
              <div class="text-center p-3">
                <a onclick="$('html, body').animate({scrollTop: $('#rekomen').offset().top}, 1000);$('#fullscreenModal').modal('hide');">Rekomendasi</a>
              </div>
              <div class="text-center p-3">
                <a onclick="$('html, body').animate({scrollTop: $('#kontak').offset().top}, 1000);$('#fullscreenModal').modal('hide');">Kontak</a>
              </div>
              @if(Auth::guard('users')->check() || Auth::guard('admin')->check())
              <div class="text-center p-3">
                @if(Auth::guard('admin')->check())
                <a onclick="window.location.href='/admin/dashboard'">Admin Dashboard</a>
                @else
                <a onclick="window.location.href='/user/dashboard'">Dashboard</a>
                @endif
              </div>
              @else
              <div class="text-center p-3">
                <a onclick="window.location.href='/user/login'">Login</a>
              </div>
              @endif
            </div>
        </div>
      </div>
    </div>
  <script src="landing-assets/js/jquery.min.js"></script>
  <script src="landing-assets/js/bootstrap.bundle.min.js"></script>
  <script src="landing-assets/js/onepageNav.js"></script>
  <script src="landing-assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="landing-assets/js/glightbox.js"></script>
  <script src="landing-assets/js/swiper.min.js"></script>
  <script src="landing-assets/js/jquery.appear.min.js"></script>
  <script src="landing-assets/js/aos.js"></script>
  <script src="landing-assets/js/custom.js"></script>
  <script>
    function kirim_masukan(){
      $.ajax({
        url: '/kirim_masukan',
        type: 'POST',
        data: $('#form-kirim-masukan').serialize(),
        success: function(data) {
          alert(data.message)
        },
        error: function(data) {
          alert(data.responseJSON.message)
        }
      })
    }
  </script>
</body>

</html>