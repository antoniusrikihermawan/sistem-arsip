<x-guest-layout>
    @section('page-title', 'Lupa Kata Sandi')

    <h4 class="auth-heading">Lupa Kata Sandi?</h4>
    <p class="auth-subheading">Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}"
                   placeholder="nama@email.com"
                   required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login mb-3">
            <i class="fas fa-paper-plane me-1"></i> Kirim Tautan Reset
        </button>

        <p class="text-center text-muted small mb-0">
            <a href="{{ route('login') }}" class="auth-footer-link">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Login
            </a>
        </p>
    </form>
</x-guest-layout>
