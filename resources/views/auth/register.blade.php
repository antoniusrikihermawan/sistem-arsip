<x-guest-layout>
    @section('page-title', 'Daftar')

    <h4 class="auth-heading">Buat Akun Baru</h4>
    <p class="auth-subheading">Isi data berikut untuk membuat akun</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}"
                   placeholder="Masukkan nama lengkap"
                   required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}"
                   placeholder="nama@email.com"
                   required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" placeholder="Minimal 8 karakter"
                   required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   name="password_confirmation" placeholder="Ulangi kata sandi"
                   required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login mb-3">
            <i class="fas fa-user-plus me-1"></i> Daftar
        </button>

        <p class="text-center text-muted small mb-0">
            Sudah punya akun? <a href="{{ route('login') }}" class="auth-footer-link">Masuk</a>
        </p>
    </form>
</x-guest-layout>
