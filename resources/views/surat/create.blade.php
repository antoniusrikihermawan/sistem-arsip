@extends('layouts.app')

@section('title', 'Tambah Surat Baru')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row pb-3 mb-4 align-items-center">
        <div class="col-12 col-md-8">
            <h3 class="fw-bold mb-1 text-primary-custom">Tambah Surat Baru</h3>
            <p class="text-secondary-custom mb-0">Lengkapi formulir di bawah ini untuk mengarsipkan surat baru.</p>
        </div>
        <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ url('surat') }}" class="btn btn-light shadow-sm border-custom d-inline-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="row g-4">
        <div class="col-12 col-xl-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-card border-bottom py-3 px-4 d-flex align-items-center gap-2" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <div class="bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h6 class="mb-0 fw-bold text-primary-custom">Detail Informasi Surat</h6>
                </div>
                
                <div class="card-body p-4">
                    <form action="#" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Jenis Surat & Kategori -->
                            <div class="col-12 col-md-6">
                                <label for="jenis_surat" class="form-label fw-medium text-secondary-custom fs-7">Jenis Surat <span class="text-danger">*</span></label>
                                <select class="form-select select2-hidden-accessible" id="jenis_surat" name="jenis_surat" required>
                                    <option value="" disabled selected>Pilih Jenis Surat</option>
                                    <option value="masuk">Surat Masuk</option>
                                    <option value="keluar">Surat Keluar</option>
                                </select>
                                <div class="invalid-feedback">Silakan pilih jenis surat.</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="kategori_id" class="form-label fw-medium text-secondary-custom fs-7">Kategori / Klasifikasi <span class="text-danger">*</span></label>
                                <select class="form-select select2-hidden-accessible" id="kategori_id" name="kategori_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="1">Undangan</option>
                                    <option value="2">Pemberitahuan</option>
                                    <option value="3">Permohonan</option>
                                    <option value="4">Laporan</option>
                                </select>
                                <div class="invalid-feedback">Silakan pilih kategori surat.</div>
                            </div>

                            <!-- Nomor & Tanggal Surat -->
                            <div class="col-12 col-md-6">
                                <label for="nomor_surat" class="form-label fw-medium text-secondary-custom fs-7">Nomor Surat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan nomor surat" required>
                                <div class="invalid-feedback">Nomor surat wajib diisi.</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="tanggal_surat" class="form-label fw-medium text-secondary-custom fs-7">Tanggal Surat <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-custom text-secondary-custom">
                                        <i class="bi bi-calendar3"></i>
                                    </span>
                                    <input type="text" class="form-control datepicker bg-transparent" id="tanggal_surat" name="tanggal_surat" placeholder="DD-MM-YYYY" required>
                                    <div class="invalid-feedback">Tanggal surat wajib diisi.</div>
                                </div>
                            </div>

                            <!-- Asal/Tujuan -->
                            <div class="col-12">
                                <label for="asal_tujuan" class="form-label fw-medium text-secondary-custom fs-7">Asal / Tujuan Surat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="asal_tujuan" name="asal_tujuan" placeholder="Contoh: Kementerian Dalam Negeri" required>
                                <div class="invalid-feedback">Asal/tujuan surat wajib diisi.</div>
                            </div>

                            <!-- Perihal -->
                            <div class="col-12">
                                <label for="perihal" class="form-label fw-medium text-secondary-custom fs-7">Perihal / Ringkasan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="perihal" name="perihal" rows="3" placeholder="Tuliskan perihal atau ringkasan surat disini..." required></textarea>
                                <div class="invalid-feedback">Perihal wajib diisi.</div>
                            </div>

                            <!-- Tanggal Diterima (Khusus Surat Masuk) -->
                            <div class="col-12 col-md-6">
                                <label for="tanggal_terima" class="form-label fw-medium text-secondary-custom fs-7">Tanggal Diterima</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-custom text-secondary-custom">
                                        <i class="bi bi-calendar-check"></i>
                                    </span>
                                    <input type="text" class="form-control datepicker bg-transparent" id="tanggal_terima" name="tanggal_terima" placeholder="DD-MM-YYYY">
                                </div>
                                <div class="form-text fs-7">Isi jika ini adalah surat masuk.</div>
                            </div>
                        </div>

                        <hr class="my-4 border-custom">

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light border-custom">Batal</button>
                            <button type="button" class="btn btn-primary d-inline-flex align-items-center gap-2">
                                <i class="bi bi-save"></i> Simpan Data Surat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- File Upload Area -->
        <div class="col-12 col-xl-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-card border-bottom py-3 px-4 d-flex align-items-center gap-2" style="border-top-left-radius: var(--border-radius-12); border-top-right-radius: var(--border-radius-12);">
                    <div class="bg-success-soft text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-cloud-upload"></i>
                    </div>
                    <h6 class="mb-0 fw-bold text-primary-custom">Unggah Berkas PDF</h6>
                </div>
                
                <div class="card-body p-4 d-flex flex-column">
                    <div class="upload-container text-center p-4 border rounded border-custom bg-main mb-3 position-relative" style="border-style: dashed !important; border-width: 2px !important;" id="drop-area">
                        <i class="bi bi-file-earmark-pdf text-secondary-custom mb-3" style="font-size: 3rem;"></i>
                        <h6 class="fw-bold text-primary-custom mb-1">Tarik & Letakkan file di sini</h6>
                        <p class="text-secondary-custom fs-7 mb-3">atau klik tombol di bawah untuk mencari file dari perangkat Anda. (Maks. 5MB, format PDF)</p>
                        
                        <input type="file" id="file_surat" name="file_surat" class="d-none" accept=".pdf">
                        <button type="button" class="btn btn-sm btn-primary px-4 shadow-sm" onclick="document.getElementById('file_surat').click();">
                            Pilih File PDF
                        </button>
                    </div>

                    <!-- File Preview Area (Hidden by default) -->
                    <div id="file-preview-area" class="d-none flex-grow-1 d-flex flex-column">
                        <h6 class="fw-bold text-primary-custom mb-2">Preview Dokumen</h6>
                        <div class="flex-grow-1 border rounded border-custom bg-main overflow-hidden position-relative" style="min-height: 300px;">
                            <!-- PDF Preview will go here. For now we put a placeholder -->
                            <div class="d-flex align-items-center justify-content-center h-100 p-3 text-center">
                                <div>
                                    <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
                                    <p class="mb-0 fw-medium text-primary-custom" id="preview-filename">surat_undangan.pdf</p>
                                    <small class="text-secondary-custom" id="preview-filesize">2.4 MB</small>
                                    <div class="mt-3">
                                        <button class="btn btn-sm btn-outline-danger" onclick="removeFile()">Hapus File</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .upload-container {
        transition: all 0.3s ease;
    }
    .upload-container.dragover {
        background-color: var(--sidebar-hover-bg) !important;
        border-color: var(--bs-primary) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('select.select2-hidden-accessible').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });

        // Initialize Datepicker
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'id'
        });

        // Form Validation Bootstrap
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })

        // Drag and drop file upload handling
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('file_surat');
        const previewArea = document.getElementById('file-preview-area');
        const previewFilename = document.getElementById('preview-filename');
        const previewFilesize = document.getElementById('preview-filesize');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => {
                dropArea.classList.add('dragover');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => {
                dropArea.classList.remove('dragover');
            }, false);
        });

        dropArea.addEventListener('drop', (e) => {
            let dt = e.dataTransfer;
            let files = dt.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });

        function handleFiles(files) {
            if(files.length > 0) {
                const file = files[0];
                if(file.type === "application/pdf") {
                    dropArea.classList.add('d-none');
                    previewArea.classList.remove('d-none');
                    previewFilename.textContent = file.name;
                    previewFilesize.textContent = (file.size / (1024*1024)).toFixed(2) + ' MB';
                } else {
                    alert("Hanya file PDF yang diizinkan!");
                }
            }
        }
    });

    function removeFile() {
        document.getElementById('file_surat').value = "";
        document.getElementById('drop-area').classList.remove('d-none');
        document.getElementById('file-preview-area').classList.add('d-none');
    }
</script>
@endpush
