@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Informasi Surat Keluar</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px">Nomer Surat</th>
                    <td>{{ $surat_keluar->nomer_surat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ \Carbon\Carbon::parse($surat_keluar->tanggal_surat)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kirim</th>
                    <td>{{ \Carbon\Carbon::parse($surat_keluar->tanggal_kirim)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $surat_keluar->perihal }}</td>
                </tr>
                <tr>
                    <th>Ditujukan</th>
                    <td>{{ $surat_keluar->ditujukan }}</td>
                </tr>
                <tr>
                    <th>File Surat</th>
                    <td>
                        @if($surat_keluar->file_surat)
                            <a href="{{ Storage::url($surat_keluar->file_surat) }}" target="_blank" class="btn btn-primary btn-sm">Download / Lihat File</a>
                        @else
                            <span class="text-muted">Tidak ada file lampiran</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Dibuat Oleh</th>
                    <td>{{ $surat_keluar->user->name }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $surat_keluar->created_at->format('d F Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('surat-keluar.index') }}" class="btn btn-default">Kembali</a>
            <a href="{{ route('surat-keluar.edit', $surat_keluar->id_surat_keluar) }}" class="btn btn-warning">Edit Data</a>
        </div>
    </div>
</div>
@endsection
