@extends('layouts.app')

@section('content')

<style>
    .bg-brand-gradient {
        background: linear-gradient(135deg, #ff5b95 0%, #b57aa1 100%);
        color: white !important;
    }
    .card-hover {
        transition: all 0.3s ease-in-out;
        border: 1px solid transparent;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(255, 91, 149, 0.2);
        border-color: rgba(255, 91, 149, 0.3);
    }
    .icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 1.5rem;
    }
    .icon-brand-soft {
        background: rgba(255, 91, 149, 0.1);
        color: #ff5b95;
    }
    .icon-brand-soft-purple {
        background: rgba(181, 122, 161, 0.1);
        color: #b57aa1;
    }
    .text-brand-pink { color: #ff5b95 !important; }
    .text-brand-purple { color: #b57aa1 !important; }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-brand-gradient border-0 shadow-sm overflow-hidden">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body py-5 px-4 px-md-5">
                            <span class="badge bg-white text-brand-pink mb-3" style="font-weight: 600; letter-spacing: 1px;">METAMORJIWA ADMIN</span>
                            <h2 class="card-title text-white mb-2" style="font-weight: 700;">{{ $greeting }}, {{ explode(' ', trim($user->name))[0] }}! ✨</h2>
                            <p class="mb-4 text-white" style="opacity: 0.9; font-size: 1.05rem;">
                                Pantau terus perkembangan interaksi pengunjung Anda hari ini. Semua statistik utama berada dalam kendali Anda.
                            </p>
                            <a href="{{ route('hero.edit') }}" class="btn btn-light text-brand-pink shadow-sm fw-bold me-2">
                                <i class="bx bx-edit-alt me-1"></i> Update Hero
                            </a>
                            <a href="{{ route('preview.index') }}" class="btn btn-outline-light fw-bold">
                                <i class="bx bx-layer me-1"></i> Kelola Preview 
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center text-sm-left position-relative">
                        <img src="{{ asset('sneat') }}/assets/img/illustrations/man-with-laptop-light.png" 
                             class="position-absolute bottom-0 end-0 me-4 d-none d-sm-block" 
                             height="200" 
                             style="filter: drop-shadow(-10px 10px 15px rgba(0,0,0,0.1));"
                             alt="Welcome Graphic" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
            <div class="card card-hover h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box icon-brand-soft">
                            <i class="bx bx-user"></i>
                        </div>
                        <span class="badge bg-label-success rounded-pill">+24%</span>
                    </div>
                    <span class="d-block mb-1 text-muted fw-semibold">Total Pengguna</span>
                    <h3 class="card-title mb-0 text-dark" style="font-weight: 700;">{{ $totalUsers ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
            <div class="card card-hover h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box icon-brand-soft-purple">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <span class="badge bg-label-danger rounded-pill">Inbox</span>
                    </div>
                    <span class="d-block mb-1 text-muted fw-semibold">Pesan Masuk</span>
                    <h3 class="card-title mb-0 text-dark" style="font-weight: 700;">{{ $totalMessages ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-sm-0">
            <div class="card card-hover h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box bg-label-info">
                            <i class="bx bx-dock-top" style="color:#03c3ec;"></i>
                        </div>
                        <span class="badge bg-label-info rounded-pill">Aktif</span>
                    </div>
                    <span class="d-block mb-1 text-muted fw-semibold">Total Preview </span>
                    <h3 class="card-title mb-0 text-dark" style="font-weight: 700;">{{ $totalPreview ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-hover h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box bg-label-warning">
                            <i class="bx bx-star" style="color:#ffab00;"></i>
                        </div>
                        <span class="badge bg-label-warning rounded-pill">Review</span>
                    </div>
                    <span class="d-block mb-1 text-muted fw-semibold">Testimoni Klien</span>
                    <h3 class="card-title mb-0 text-dark" style="font-weight: 700;">{{ $totalTestimoni ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-8 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2 text-brand-pink fw-bold">Statistik Kunjungan</h5>
                        <small class="text-muted">Interaksi website 7 hari terakhir</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="kunjunganChartDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="kunjunganChartDropdown">
                            <a class="dropdown-item" href="javascript:void(0);">Download PDF</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <div class="d-flex p-4 pt-3">
                                <div>
                                    <h6 class="mb-0 text-brand-purple">Traffic Overview</h6>
                                    <div class="d-flex align-items-center mb-2">
                                        <h4 class="mb-0 me-2">1,245</h4>
                                        <span class="text-success text-sm"><i class='bx bx-up-arrow-alt'></i> 12.5%</span>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 text-brand-purple fw-bold">Pesan Terbaru</h5>
                    <a href="{{ route('message.index') }}" class="btn btn-sm btn-outline-primary text-brand-pink border-brand-pink" style="border-color:#ff5b95;">View All</a>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @forelse($latestMessages as $msg)
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-envelope text-brand-pink"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{ $msg->name ?? 'User' }}</h6>
                                    <small class="text-muted text-truncate d-block" style="max-width: 150px;">{{ $msg->message ?? 'Mengirim pesan baru' }}</small>
                                </div>
                                <div class="user-progress text-end">
                                    <small class="fw-semibold text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="text-center text-muted pt-4">
                            <img src="{{ asset('sneat') }}/assets/img/illustrations/page-misc-under-maintenance.png" height="100" class="mb-3 opacity-50">
                            <p>Belum ada pesan masuk.</p>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;
    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Data Palsu/Dummy untuk mempercantik chart (Bisa dikoneksikan ke DB nanti)
    const incomeChartEl = document.querySelector('#incomeChart'),
    incomeChartConfig = {
      series: [
        {
          name: 'Views',
          data: [24, 21, 30, 22, 42, 26, 35, 29]
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: { show: false },
        type: 'area'
      },
      dataLabels: { enabled: false },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: { show: false },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 7,
            strokeColor: '#ff5b95', // Warna Brand Pink
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: { size: 7 }
      },
      colors: ['#ff5b95'], // Garis Warna Pink
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: { top: -20, bottom: -8, left: -10, right: 8 }
      },
      xaxis: {
        categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        axisBorder: { show: false },
        axisTicks: { show: false },
        labels: { show: true, style: { fontSize: '13px', colors: axisColor } }
      },
      yaxis: {
        labels: { show: false },
        min: 10,
        max: 50,
        tickAmount: 4
      }
    };
  if (typeof ApexCharts !== undefined && incomeChartEl !== null) {
    const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }
});
</script>

@endsection