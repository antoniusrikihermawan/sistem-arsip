@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Surat Masuk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="tanggal_terima">Tanggal Terima</label>
                        <input type="date" class="form-control @error('tanggal_terima') is-invalid @enderror" id="tanggal_terima" name="tanggal_terima" value="{{ old('tanggal_terima') }}" required>
                        @error('tanggal_terima')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" value="{{ old('pengirim') }}" placeholder="Pengirim Surat" required>
                    @error('pengirim')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
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
