@extends('admin.slicing.index')

@section('title', 'Dashboard Admin')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{ asset('main-assets/images/elements/decore-left.png') }}"
                                    class="congratulations-img-left" alt="card-img-left" />
                                <img src="{{ asset('main-assets/images/elements/decore-right.png') }}"
                                    class="congratulations-img-right" alt="card-img-right" />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="smile" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Welcome {{ Auth::user()->nama }}!</h1>
                                    <p class="card-text m-auto w-75">
                                        Selamat datang di halaman admin E-Perlib. Semoga harimu menyenangkan!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{ $member }}</h2>
                                <p class="card-text">Pengguna Terdaftar</p>
                            </div>
                            <div id="gained-chart"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="book" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{ $buku }}</h2>
                                <p class="card-text">Buku Tersedia</p>
                            </div>
                            <div id="order-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="row match-height">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row pb-50">
                                    <div
                                        class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                                        <div class="mb-sm-0">
                                            <h2 class="fw-bolder mb-25">{{ $peminjaman }}</h2>
                                            <p class="card-text fw-bold">Avg Peminjaman </p>
                                            <div class="font-medium-2">
                                                <span class="text-success me-25">{{ $getPercentageofPeminjaman }}%</span>
                                                <span>vs last 7 days</span>
                                            </div>
                                        </div>
                                        <div class="d-flex" style="transform: translateY(-25px);">
                                            <a href="{{ route('admin.download_report') }}" class="btn btn-primary w-75">Download
                                                Report</a>
                                            <a href="{{ route('admin.peminjaman') }}" class="btn btn-info ms-5 w-75">Daftar Peminjaman</a>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-6 col-12 d-flex justify-content-between flex-column text-end order-sm-2 order-1">
                                        <div id="avg-sessions-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var arrayData = JSON.parse('{!! $memberSevenDaysAgo !!}');
    var gainedChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.primary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Member',
        data: arrayData
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
</script>
<script>
    var arrayData = JSON.parse('{!! $bookIncrease !!}');
    orderChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Buku',
        data: arrayData
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
</script>
<script>
    var arrayData = JSON.parse('{!! $peminjamanSevenDaysAgo !!}');
    var $avgSessionStrokeColor2 = '#ebf0f7';
    function findHighestToSetColor(number) {
        var highest = Math.max.apply(Math, arrayData);
        if (number == highest) {
            return window.colors.solid.primary;
        } else {
            return $avgSessionStrokeColor2;
        }
    }
    var avgSessionsChartOptions = {
    chart: {
      type: 'bar',
      height: 220,
    },
    legend: { show: false },
    colors: [
        findHighestToSetColor(arrayData[0]),
        findHighestToSetColor(arrayData[1]),
        findHighestToSetColor(arrayData[2]),
        findHighestToSetColor(arrayData[3]),
        findHighestToSetColor(arrayData[4]),
        findHighestToSetColor(arrayData[5]),
        findHighestToSetColor(arrayData[6])
    ],
    series: [
      {
        name: 'Peminjaman',
        data: arrayData
      }
    ],
    dataLabels: {
      enabled: false
    },
    grid: {
      padding: {
        left: 0,
        right: 0,
      }
    },
    yaxis: {
        show: true,
        type: 'numeric'
    },
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    plotOptions: {
      bar: {
        columnWidth: '40%',
        distributed: true
      }
    },
    tooltip: {
      x: { show: false }
    },
  };
</script>
<script src="{{ asset('main-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
@endsection
