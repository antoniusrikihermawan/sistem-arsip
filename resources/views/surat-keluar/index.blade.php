@extends('layouts.app')

@section('title', 'Data Surat Keluar')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="card-title fw-bold">Daftar Surat Keluar</h3>
                <div class="card-tools">
                    <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Data
                    </a>
                </div>
            </div>
            
            <!-- Form Pencarian & Filter -->
            <div class="mt-3">
                <x-search-filter action="{{ route('surat-keluar.index') }}" />
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 table-responsive">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Kirim</th>
                        <th>Perihal</th>
                        <th>Ditujukan</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suratKeluar as $item)
                        <tr>
                            <td>{{ $loop->iteration + $suratKeluar->firstItem() - 1 }}</td>
                            <td>{{ $item->nomer_surat }}</td>
                            <td>{{ $item->tanggal_surat->format('d F Y') }}</td>
                            <td>{{ $item->tanggal_kirim->format('d F Y') }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->ditujukan }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <a href="{{ route('surat-keluar.show', $item->id_surat_keluar) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('surat-keluar.edit', $item->id_surat_keluar) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('surat-keluar.destroy', $item->id_surat_keluar) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event, 'Yakin ingin menghapus data surat keluar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data belum ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $suratKeluar->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- /.card -->
</div>
@endsection
