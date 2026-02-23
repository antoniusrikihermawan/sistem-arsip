@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row pb-3 mb-4 align-items-center">
        <div class="col-12 col-md-8">
            <h3 class="fw-bold mb-1 text-primary-custom">Dashboard Overview</h3>
            <p class="text-secondary-custom mb-0">Ringkasan statistik dan aktivitas persuratan Anda.</p>
        </div>
        <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ url('surat/create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Surat Baru
            </a>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-xl-8">
            <!-- Stats Row -->
            <div class="row g-3 mb-4">
                <!-- Surat Masuk Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card h-100 p-2 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--bg-card) 0%, rgba(37,99,235,0.05) 100%);">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="stat-icon text-primary bg-primary-soft" style="width: 40px; height: 40px; font-size: 1.25rem;">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                </div>
                                <span class="badge bg-success-soft text-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-up-short"></i> 12%
                                </span>
                            </div>
                            <p class="text-secondary-custom mb-1 fw-medium fs-7">Surat Masuk</p>
                            <h3 class="fw-bold mb-0 text-primary-custom">245</h3>
                        </div>
                    </div>
                </div>

                <!-- Surat Keluar Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card h-100 p-2 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--bg-card) 0%, rgba(34,197,94,0.05) 100%);">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="stat-icon text-success bg-success-soft" style="width: 40px; height: 40px; font-size: 1.25rem;">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </div>
                                <span class="badge bg-success-soft text-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-up-short"></i> 8%
                                </span>
                            </div>
                            <p class="text-secondary-custom mb-1 fw-medium fs-7">Surat Keluar</p>
                            <h3 class="fw-bold mb-0 text-primary-custom">182</h3>
                        </div>
                    </div>
                </div>

                <!-- Disposisi Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card h-100 p-2 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--bg-card) 0%, rgba(245,158,11,0.05) 100%);">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="stat-icon text-warning bg-warning-soft" style="width: 40px; height: 40px; font-size: 1.25rem;">
                                    <i class="bi bi-arrow-return-right"></i>
                                </div>
                            </div>
                            <p class="text-secondary-custom mb-1 fw-medium fs-7">Perlu Tindakan</p>
                            <h3 class="fw-bold mb-0 text-primary-custom">12</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Arsip Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card h-100 p-2 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--bg-card) 0%, rgba(13,202,240,0.05) 100%);">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="stat-icon text-info bg-info-soft" style="width: 40px; height: 40px; font-size: 1.25rem;">
                                    <i class="bi bi-archive"></i>
                                </div>
                            </div>
                            <p class="text-secondary-custom mb-1 fw-medium fs-7">Total Arsip</p>
                            <h3 class="fw-bold mb-0 text-primary-custom">1,245</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Row -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-card border-bottom py-3 d-flex justify-content-between align-items-center px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <h6 class="mb-0 fw-bold text-primary-custom">Tren Surat Per Bulan</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                            Tahun 2026 <i class="bi bi-chevron-down ms-1 fs-7"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-custom">
                            <li><a class="dropdown-item" href="#">2026</a></li>
                            <li><a class="dropdown-item" href="#">2025</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-4">
                    <canvas id="suratChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Right Sidebar Area -->
        <div class="col-12 col-xl-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-card border-bottom py-3 d-flex justify-content-between align-items-center px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <h6 class="mb-0 fw-bold text-primary-custom">Surat Terbaru</h6>
                    <a href="#" class="text-decoration-none fs-7 fw-medium">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush border-radius-12">
                        <!-- Item 1 -->
                        <a href="#" class="list-group-item list-group-item-action bg-transparent border-bottom border-custom p-3 d-flex align-items-start gap-3">
                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="mb-1 text-primary-custom text-truncate fs-6">Undangan Rapat Koordinasi Tahunan</h6>
                                <p class="mb-1 text-secondary-custom fs-7 text-truncate">Kementerian Dalam Negeri</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <span class="badge bg-warning-soft text-warning rounded-pill px-2 py-1 fs-7" style="font-size: 0.7rem;">Diproses</span>
                                    <small class="text-secondary-custom" style="font-size: 0.75rem;">10 menit lalu</small>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Item 2 -->
                        <a href="#" class="list-group-item list-group-item-action bg-transparent border-bottom border-custom p-3 d-flex align-items-start gap-3">
                            <div class="bg-success-soft text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="mb-1 text-primary-custom text-truncate fs-6">Laporan Evaluasi Proyek Kinerja</h6>
                                <p class="mb-1 text-secondary-custom fs-7 text-truncate">Divisi Perencanaan</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <span class="badge bg-success-soft text-success rounded-pill px-2 py-1 fs-7" style="font-size: 0.7rem;">Selesai</span>
                                    <small class="text-secondary-custom" style="font-size: 0.75rem;">1 jam lalu</small>
                                </div>
                            </div>
                        </a>

                        <!-- Item 3 -->
                        <a href="#" class="list-group-item list-group-item-action bg-transparent border-bottom border-custom p-3 d-flex align-items-start gap-3">
                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="mb-1 text-primary-custom text-truncate fs-6">Surat Edaran Libur Nasional</h6>
                                <p class="mb-1 text-secondary-custom fs-7 text-truncate">Sekretariat Daerah</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <span class="badge bg-info-soft text-info rounded-pill px-2 py-1 fs-7" style="font-size: 0.7rem;">Disposisi</span>
                                    <small class="text-secondary-custom" style="font-size: 0.75rem;">Kemarin, 14:30</small>
                                </div>
                            </div>
                        </a>

                        <!-- Item 4 -->
                        <a href="#" class="list-group-item list-group-item-action bg-transparent border-0 p-3 d-flex align-items-start gap-3" style="border-bottom-left-radius: var(--border-radius-12); border-bottom-right-radius: var(--border-radius-12);">
                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="mb-1 text-primary-custom text-truncate fs-6">Permohonan Izin Kegiatan</h6>
                                <p class="mb-1 text-secondary-custom fs-7 text-truncate">BEM Universitas</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <span class="badge bg-warning-soft text-warning rounded-pill px-2 py-1 fs-7" style="font-size: 0.7rem;">Pending</span>
                                    <small class="text-secondary-custom" style="font-size: 0.75rem;">2 hari lalu</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('suratChart').getContext('2d');
        const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--bs-primary').trim() || '#2563eb';
        const successColor = getComputedStyle(document.documentElement).getPropertyValue('--bs-success').trim() || '#22c55e';
        const gridColor = getComputedStyle(document.documentElement).getPropertyValue('--border-color').trim() || '#e5e7eb';
        const textColor = getComputedStyle(document.documentElement).getPropertyValue('--text-secondary').trim() || '#6b7280';

        const gradientBlue = ctx.createLinearGradient(0, 0, 0, 300);
        gradientBlue.addColorStop(0, 'rgba(37, 99, 235, 0.2)');
        gradientBlue.addColorStop(1, 'rgba(37, 99, 235, 0)');

        const gradientGreen = ctx.createLinearGradient(0, 0, 0, 300);
        gradientGreen.addColorStop(0, 'rgba(34, 197, 94, 0.2)');
        gradientGreen.addColorStop(1, 'rgba(34, 197, 94, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
                    {
                        label: 'Surat Masuk',
                        data: [45, 52, 38, 65, 59, 80, 81, 56, 55, 40, 68, 85],
                        borderColor: primaryColor,
                        backgroundColor: gradientBlue,
                        borderWidth: 2,
                        pointBackgroundColor: primaryColor,
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: primaryColor,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Surat Keluar',
                        data: [28, 48, 40, 19, 86, 27, 90, 45, 60, 38, 55, 78],
                        borderColor: successColor,
                        backgroundColor: gradientGreen,
                        borderWidth: 2,
                        pointBackgroundColor: successColor,
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: successColor,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: textColor,
                            usePointStyle: true,
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255,255,255,0.1)',
                        borderWidth: 1
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: textColor
                        }
                    },
                    y: {
                        grid: {
                            color: gridColor,
                            drawBorder: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            color: textColor,
                            stepSize: 20
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>
@endpush
