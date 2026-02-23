@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Surat Keluar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nomer_surat">Nomer Surat</label>
                    <input type="text" class="form-control @error('nomer_surat') is-invalid @enderror" id="nomer_surat" name="nomer_surat" value="{{ old('nomer_surat') }}" placeholder="Masukkan Nomer Surat" required>
                    @error('nomer_surat')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                        @error('tanggal_surat')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label for="tanggal_kirim">Tanggal Kirim</label>
                        <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" id="tanggal_kirim" name="tanggal_kirim" value="{{ old('tanggal_kirim') }}" required>
                        @error('tanggal_kirim')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}" placeholder="Perihal Surat" required>
                    @error('perihal')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ditujukan">Ditujukan Kepada</label>
                    <input type="text" class="form-control @error('ditujukan') is-invalid @enderror" id="ditujukan" name="ditujukan" value="{{ old('ditujukan') }}" placeholder="Ditujukan Kepada" required>
                    @error('ditujukan')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file_surat">File Surat</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file_surat') is-invalid @enderror" id="file_surat" name="file_surat" accept=".pdf,.png,.jpg,.jpeg">
                            <label class="custom-file-label" for="file_surat">Pilih file</label>
                        </div>
                    </div>
                    <small class="form-text text-muted">Format yang diperbolehkan: PDF, JPG, JPEG, PNG. Maksimal ukuran 2MB.</small>
                    @error('file_surat')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-default float-right">Batal</a>
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
