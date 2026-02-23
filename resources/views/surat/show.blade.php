@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row pb-3 mb-4 align-items-center">
        <div class="col-12 col-md-8">
            <h3 class="fw-bold mb-1 text-primary-custom">Detail Surat #001/SM/BEM/26</h3>
            <p class="text-secondary-custom mb-0">Informasi lengkap surat beserta riwayat disposisi.</p>
        </div>
        <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0 d-flex justify-content-md-end gap-2">
            <a href="{{ url('surat') }}" class="btn btn-light shadow-sm border-custom d-inline-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-pencil-square"></i> Edit Data
            </button>
        </div>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Info dan Riwayat -->
        <div class="col-12 col-xl-5">
            <!-- Informasi Utama -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-card border-bottom py-3 d-flex justify-content-between align-items-center px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <h6 class="mb-0 fw-bold text-primary-custom">Informasi Surat</h6>
                    <span class="badge bg-warning-soft text-warning fw-medium rounded-pill px-3 py-2">Pending</span>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <span class="d-block text-secondary-custom fs-7 fw-medium mb-1">Nomor Surat</span>
                            <span class="fw-bold text-primary-custom fs-6">001/SM/BEM/26</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <span class="d-block text-secondary-custom fs-7 fw-medium mb-1">Tanggal Surat</span>
                                <span class="fw-medium text-primary-custom">12 Feb 2026</span>
                            </div>
                            <div class="col-6">
                                <span class="d-block text-secondary-custom fs-7 fw-medium mb-1">Tanggal Diterima</span>
                                <span class="fw-medium text-primary-custom">13 Feb 2026</span>
                            </div>
                        </div>
                        <div>
                            <span class="d-block text-secondary-custom fs-7 fw-medium mb-1">Asal/Tujuan Surat</span>
                            <div class="d-flex align-items-center mt-1">
                                <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 28px; height: 28px;">
                                    <i class="bi bi-building fs-7"></i>
                                </div>
                                <span class="fw-semibold text-primary-custom">BEM Universitas</span>
                            </div>
                        </div>
                        <div>
                            <span class="d-block text-secondary-custom fs-7 fw-medium mb-1">Perihal</span>
                            <p class="mb-0 text-primary-custom form-control bg-main border-custom shadow-none" readonly style="min-height: 80px;">Permohonan Peminjaman Ruangan Auditorium Tipe A.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline Disposisi -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-card border-bottom py-3 d-flex justify-content-between align-items-center px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <h6 class="mb-0 fw-bold text-primary-custom">Riwayat Disposisi</h6>
                    <button class="btn btn-sm btn-outline-primary fw-medium rounded-pill px-3">
                        <i class="bi bi-plus-lg"></i> Tambah Disposisi
                    </button>
                </div>
                <div class="card-body p-4 pb-0">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <div class="timeline-icon text-success border-success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div class="timeline-content shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0 fw-bold text-primary-custom">Surat Masuk Diterima</h6>
                                    <span class="timeline-date">13 Feb 2026, 09:30</span>
                                </div>
                                <p class="mb-0 text-secondary-custom fs-7">Diterima oleh Resepsionis dan diarsipkan dalam sistem.</p>
                                <div class="d-flex align-items-center gap-2 mt-2">
                                    <img src="https://ui-avatars.com/api/?name=Staf&background=10b981&color=fff&rounded=true" alt="User" width="20" height="20" class="rounded-circle">
                                    <span class="fw-medium text-secondary-custom fs-7">Staf Administrasi</span>
                                </div>
                            </div>
                        </li>
                        
                        <li class="timeline-item">
                            <div class="timeline-icon text-primary border-primary">
                                <i class="bi bi-arrow-return-right"></i>
                            </div>
                            <div class="timeline-content shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0 fw-bold text-primary-custom">Disposisi ke Kepala Bagian Umum</h6>
                                    <span class="timeline-date">13 Feb 2026, 11:00</span>
                                </div>
                                <p class="mb-0 text-secondary-custom fs-7 text-dark fw-medium bg-warning-soft px-2 py-1 rounded w-auto d-inline-block border border-warning border-opacity-25 mt-1">Harap ditindaklanjuti terkait kosong tidaknya jadwal auditorium.</p>
                                <div class="d-flex align-items-center gap-2 mt-3">
                                    <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff&rounded=true" alt="User" width="20" height="20" class="rounded-circle">
                                    <span class="fw-medium text-secondary-custom fs-7">Admin Sistem</span>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-item">
                            <div class="timeline-icon text-warning border-warning border-opacity-50 text-opacity-50" style="background-color: var(--bg-main);">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="timeline-content shadow-sm" style="opacity: 0.7;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0 fw-bold text-primary-custom">Menunggu Tindakan</h6>
                                    <span class="badge bg-warning-soft text-warning fw-medium px-2 py-1 rounded fs-7">Pending</span>
                                </div>
                                <p class="mb-0 text-secondary-custom fs-7">Surat sedang menunggu konfirmasi/tindakan dari Kepala Bagian Umum.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Preview PDF -->
        <div class="col-12 col-xl-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-card border-bottom py-3 d-flex justify-content-between align-items-center px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-pdf fs-5 text-danger"></i>
                        <h6 class="mb-0 fw-bold text-primary-custom">Preview Berkas PDF</h6>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-light border-custom shadow-sm" title="Print">
                            <i class="bi bi-printer"></i>
                        </button>
                        <button class="btn btn-sm btn-success shadow-sm d-flex align-items-center gap-1" title="Unduh">
                            <i class="bi bi-download"></i> <span class="d-none d-md-inline">Unduh PDF</span>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0 d-flex flex-column" style="min-height: 700px; background-color: #525659;">
                    <!-- Simulasi iFrame PDF -->
                    <div class="flex-grow-1 w-100 d-flex align-items-center justify-content-center text-white text-center flex-column h-100 p-5">
                        <i class="bi bi-file-earmark-pdf" style="font-size: 5rem; opacity: 0.5;"></i>
                        <h5 class="mt-3">Preview PDF</h5>
                        <p class="text-white-50">Di lingkungan produksi, Anda dapat menyematkan PDF menggunakan tag <code>&lt;embed src="file.pdf" /&gt;</code> atau <code>&lt;iframe&gt;</code> disini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
