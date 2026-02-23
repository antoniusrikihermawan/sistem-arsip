@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mt-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold mb-2 text-dark">{{ __('Tambah Akun Pengguna') }}</h2>
            <p class="text-muted">Isi formulir di bawah ini untuk menambahkan pengguna baru ke dalam sistem</p>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-8">
            <div class="card card-primary card-outline shadow-lg mb-4">
                <div class="card-header p-4 border-bottom-0">
                    <h3 class="card-title fw-bold text-primary" style="font-size: 1.5rem;">Form Tambah Akun</h3>
                </div>
                <!-- Gunakan p-4 agar form lebih compact konsisten dengan halaman lain -->
                <div class="card-body p-4">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">{{ __('Nama Lengkap') }} <span class="text-danger">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Contoh: Budi Santoso">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            <label for="email" class="font-weight-bold">{{ __('Alamat Email') }} <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Contoh: budi@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="font-weight-bold">{{ __('Kata Sandi') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', 'togglePasswordIcon')">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold">{{ __('Konfirmasi Kata Sandi') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation', 'toggleConfirmPasswordIcon')">
                                        <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <!-- Tombol disesuaikan agar ukurannya standar -->
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold elevation-1 mb-2">
                                <i class="fas fa-user-plus mr-2"></i> {{ __('Simpan Akun Baru') }}
                            </button>
                            
                            <!-- Tombol Kembali diletakkan di bawah tombol Simpan -->
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-block font-weight-bold border shadow-sm text-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> {{ __('Kembali ke Dashboard') }}
                            </a>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
