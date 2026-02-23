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
            <form action="{{ route('surat-keluar.index') }}" method="GET" class="mt-3">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label for="search" class="small fw-bold text-muted">Cari Surat</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="No. Surat / Perihal..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="start_date" class="small fw-bold text-muted">Mulai Tanggal</label>
                        <input type="date" name="start_date" class="form-control form-control-sm" value="{{ request('start_date') }}">
                    </div>
                    
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="end_date" class="small fw-bold text-muted">Sampai Tanggal</label>
                        <input type="date" name="end_date" class="form-control form-control-sm" value="{{ request('end_date') }}">
                    </div>

                    <div class="col-md-2">
                        <div class="d-flex w-100">
                            <button type="submit" class="btn btn-info btn-sm w-100 text-white mr-2">
                                <i class="fas fa-filter mr-1"></i> Filter
                            </button>
                            @if(request()->hasAny(['search', 'start_date', 'end_date']))
                                <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary btn-sm w-100">
                                    <i class="fas fa-undo mr-1"></i> Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
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
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d F Y') }}</td>
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
