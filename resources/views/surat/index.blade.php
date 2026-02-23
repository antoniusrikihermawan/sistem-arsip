@extends('layouts.app')

@section('title', 'Data Surat ' . ucfirst(request('jenis', 'Masuk')))

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row pb-3 mb-4 align-items-center">
        <div class="col-12 col-md-6">
            <h3 class="fw-bold mb-1 text-primary-custom">Data Surat {{ ucfirst(request('jenis', 'Masuk')) }}</h3>
            <p class="text-secondary-custom mb-0">Kelola dan pantau seluruh data surat yang ada di sistem.</p>
        </div>
        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0 d-flex justify-content-md-end gap-2">
            <button class="btn btn-light shadow-sm border-custom d-inline-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf text-danger"></i> Export PDF
            </button>
            <a href="{{ url('surat/create') }}" class="btn btn-primary shadow-sm d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Tambah Surat
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <!-- Filter Section -->
                <div class="card-header bg-card border-bottom py-3 px-4" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <form action="" method="GET" class="row g-3 align-items-center">
                        <input type="hidden" name="jenis" value="{{ request('jenis', 'masuk') }}">
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0 border-custom text-secondary-custom">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari nomor surat, pengirim..." name="search" value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <select class="form-select select2-filter" name="status">
                                <option value="">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="diproses">Diproses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-custom text-secondary-custom">
                                    <i class="bi bi-calendar3"></i>
                                </span>
                                <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal" name="tanggal">
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </form>
                </div>

                <!-- Table Section -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" style="min-width: 900px;">
                            <thead class="bg-main">
                                <tr>
                                    <th class="ps-4 py-3 text-secondary-custom fw-semibold border-bottom-0" width="5%">No</th>
                                    <th class="py-3 text-secondary-custom fw-semibold border-bottom-0" width="20%">No. Surat / Tanggal</th>
                                    <th class="py-3 text-secondary-custom fw-semibold border-bottom-0" width="25%">Asal/Tujuan Surat</th>
                                    <th class="py-3 text-secondary-custom fw-semibold border-bottom-0" width="25%">Perihal</th>
                                    <th class="py-3 text-secondary-custom fw-semibold border-bottom-0" width="10%">Status</th>
                                    <th class="pe-4 py-3 text-secondary-custom fw-semibold border-bottom-0 text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 -->
                                <tr>
                                    <td class="ps-4 fw-medium text-secondary-custom">1</td>
                                    <td>
                                        <p class="mb-0 fw-bold text-primary-custom">001/SM/BEM/26</p>
                                        <small class="text-secondary-custom">12 Feb 2026</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px;">
                                                <i class="bi bi-building"></i>
                                            </div>
                                            <span class="fw-medium text-primary-custom">BEM Universitas</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-primary-custom text-truncate" style="max-width: 250px;">Permohonan Peminjaman Ruangan Auditorium Tipe A.</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning-soft text-warning rounded-pill px-3 py-2 fw-medium">Pending</span>
                                    </td>
                                    <td class="pe-4 text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('surat/1') }}" class="btn btn-sm btn-info text-white shadow-sm" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning text-white shadow-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger shadow-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button class="btn btn-sm btn-success shadow-sm" title="Unduh PDF">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr>
                                    <td class="ps-4 fw-medium text-secondary-custom">2</td>
                                    <td>
                                        <p class="mb-0 fw-bold text-primary-custom">800/23/SEKDA/26</p>
                                        <small class="text-secondary-custom">10 Feb 2026</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px;">
                                                <i class="bi bi-building"></i>
                                            </div>
                                            <span class="fw-medium text-primary-custom">Sekretariat Daerah Sipil</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-primary-custom text-truncate" style="max-width: 250px;">Undangan Rapat Koordinasi Tahunan OPD Seluruh Provinsi Jawa Barat dan sekitarnya.</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-soft text-info rounded-pill px-3 py-2 fw-medium">Diproses</span>
                                    </td>
                                    <td class="pe-4 text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('surat/2') }}" class="btn btn-sm btn-info text-white shadow-sm" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning text-white shadow-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger shadow-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button class="btn btn-sm btn-success shadow-sm" title="Unduh PDF">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Row 3 -->
                                <tr>
                                    <td class="ps-4 fw-medium text-secondary-custom">3</td>
                                    <td>
                                        <p class="mb-0 fw-bold text-primary-custom">120/KDS/X/26</p>
                                        <small class="text-secondary-custom">05 Feb 2026</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px;">
                                                <i class="bi bi-building"></i>
                                            </div>
                                            <span class="fw-medium text-primary-custom">Dinas Kesehatan Daerah</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-primary-custom text-truncate" style="max-width: 250px;">Laporan Evaluasi Proyek Kinerja Pengadaan Obat.</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-soft text-success rounded-pill px-3 py-2 fw-medium">Selesai</span>
                                    </td>
                                    <td class="pe-4 text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('surat/3') }}" class="btn btn-sm btn-info text-white shadow-sm" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning text-white shadow-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger shadow-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button class="btn btn-sm btn-success shadow-sm" title="Unduh PDF">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination Section -->
                <div class="card-footer bg-transparent border-top border-custom py-3 px-4 d-flex justify-content-between align-items-center" style="border-bottom-left-radius: var(--border-radius-12); border-bottom-right-radius: var(--border-radius-12);">
                    <p class="text-secondary-custom mb-0 fs-7">Menampilkan 1 hingga 3 dari 45 entri</p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2-filter').select2({
            theme: 'bootstrap-5',
            minimumResultsForSearch: -1,
            width: '100%'
        });

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'id'
        });
    });
</script>
@endpush
