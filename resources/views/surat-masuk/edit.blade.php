@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
<div class="col-md-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Edit Surat Masuk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('surat-masuk.update', $surat_masuk->id_surat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nomer_surat">Nomer Surat</label>
                    <input type="text" class="form-control @error('nomer_surat') is-invalid @enderror" id="nomer_surat" name="nomer_surat" value="{{ old('nomer_surat', $surat_masuk->nomer_surat) }}" placeholder="Masukkan Nomer Surat" required>
                    @error('nomer_surat')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', $surat_masuk->tanggal_surat) }}" required>
                        @error('tanggal_surat')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label for="tanggal_terima">Tanggal Terima</label>
                        <input type="date" class="form-control @error('tanggal_terima') is-invalid @enderror" id="tanggal_terima" name="tanggal_terima" value="{{ old('tanggal_terima', $surat_masuk->tanggal_terima) }}" required>
                        @error('tanggal_terima')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" value="{{ old('pengirim', $surat_masuk->pengirim) }}" placeholder="Pengirim Surat" required>
                    @error('pengirim')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal', $surat_masuk->perihal) }}" placeholder="Perihal Surat" required>
                    @error('perihal')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ditujukan">Ditujukan Kepada</label>
                    <input type="text" class="form-control @error('ditujukan') is-invalid @enderror" id="ditujukan" name="ditujukan" value="{{ old('ditujukan', $surat_masuk->ditujukan) }}" placeholder="Ditujukan Kepada" required>
                    @error('ditujukan')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file_surat">File Surat</label>
                    
                    @if($surat_masuk->file_surat)
                        <div class="mb-2">
                            <a href="{{ Storage::url($surat_masuk->file_surat) }}" target="_blank" class="btn btn-sm btn-info">Lihat File Saat Ini</a>
                        </div>
                    @endif

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file_surat') is-invalid @enderror" id="file_surat" name="file_surat" accept=".pdf,.png,.jpg,.jpeg">
                            <label class="custom-file-label" for="file_surat">Pilih file baru untuk mengganti</label>
                        </div>
                    </div>
                    <small class="form-text text-muted">Format yang diperbolehkan: PDF, JPG, JPEG, PNG. Maksimal ukuran 2MB. Biarkan kosong jika tidak ingin mengubah file.</small>
                    @error('file_surat')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('surat-masuk.index') }}" class="btn btn-default float-right">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- bs-custom-file-input -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
