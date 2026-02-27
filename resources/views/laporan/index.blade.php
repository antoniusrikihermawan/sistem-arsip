@extends('layouts.app')

@section('title', 'Laporan Bulanan')

@section('content')
<div class="col-12">
    {{-- Filter Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold">
                <i class="fas fa-file-alt mr-2"></i>Laporan Bulanan
            </h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.index') }}" class="row align-items-end">
                <div class="col-md-3 mb-2 mb-md-0">
                    <label for="bulan" class="font-weight-bold">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control">
                        @foreach(range(1, 12) as $b)
                            <option value="{{ $b }}" {{ $bulan == $b ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2 mb-md-0">
                    <label for="tahun" class="font-weight-bold">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control"
                           value="{{ $tahun }}" min="2020" max="{{ now()->year + 1 }}">
                </div>
                <div class="col-md-6 mb-2 mb-md-0">
                    <label class="d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary mr-1">
                        <i class="fas fa-search mr-1"></i> Tampilkan
                    </button>
                    <a href="{{ route('laporan.export-pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                       class="btn btn-danger mr-1">
                        <i class="fas fa-file-pdf mr-1"></i> Export PDF
                    </a>
                    <a href="{{ route('laporan.export-excel', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                       class="btn btn-success">
                        <i class="fas fa-file-excel mr-1"></i> Export Excel
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Ringkasan --}}
    <div class="row">
        <div class="col-md-6">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-inbox"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Surat Masuk</span>
                    <span class="info-box-number">{{ $laporan['total_masuk'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-paper-plane"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Surat Keluar</span>
                    <span class="info-box-number">{{ $laporan['total_keluar'] }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Surat Masuk --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold">
                <i class="fas fa-inbox mr-2"></i>Surat Masuk
            </h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Terima</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Ditujukan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan['surat_masuk'] as $index => $surat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $surat->nomer_surat }}</td>
                            <td>{{ $surat->tanggal_surat->format('d F Y') }}</td>
                            <td>{{ $surat->tanggal_terima->format('d F Y') }}</td>
                            <td>{{ $surat->pengirim }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->ditujukan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data belum ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel Surat Keluar --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold">
                <i class="fas fa-paper-plane mr-2"></i>Surat Keluar
            </h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Kirim</th>
                        <th>Perihal</th>
                        <th>Ditujukan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan['surat_keluar'] as $index => $surat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $surat->nomer_surat }}</td>
                            <td>{{ $surat->tanggal_surat->format('d F Y') }}</td>
                            <td>{{ $surat->tanggal_kirim->format('d F Y') }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->ditujukan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data belum ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection