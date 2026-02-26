@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Informasi Surat Masuk</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px">Nomer Surat</th>
                    <td>{{ $surat_masuk->nomer_surat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ $surat_masuk->tanggal_surat->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Terima</th>
                    <td>{{ $surat_masuk->tanggal_terima->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $surat_masuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $surat_masuk->perihal }}</td>
                </tr>
                <tr>
                    <th>Ditujukan</th>
                    <td>{{ $surat_masuk->ditujukan }}</td>
                </tr>
                <tr>
                    <th>File Surat</th>
                    <td>
                        @if($surat_masuk->file_surat)
                            <a href="{{ Storage::url($surat_masuk->file_surat) }}" target="_blank" class="btn btn-primary btn-sm">Download / Lihat File</a>
                        @else
                            <span class="text-muted">Tidak ada file lampiran</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Dibuat Oleh</th>
                    <td>{{ $surat_masuk->user->name }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $surat_masuk->created_at->format('d F Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('surat-masuk.index') }}" class="btn btn-default">Kembali</a>
            <a href="{{ route('surat-masuk.edit', $surat_masuk->id_surat) }}" class="btn btn-warning">Edit Data</a>
        </div>
    </div>
</div>
@endsection
