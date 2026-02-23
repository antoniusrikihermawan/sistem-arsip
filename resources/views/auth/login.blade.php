<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="fw-bold mb-1">{{ __('Selamat Datang Kembali') }}</h3>
        <p class="text-muted small">{{ __('Silakan masuk ke akun Anda.') }}</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">{{ __('Kata Sandi') }}</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', 'togglePasswordIcon')">
                    <i class="bi bi-eye" id="togglePasswordIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label text-muted small" for="remember_me">
                    {{ __('Ingat saya') }}
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-decoration-none small text-primary" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi Anda?') }}
                </a>
            @endif
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary fw-semibold py-2">
                {{ __('Masuk') }}
            </button>
        </div>
        
        @if (Route::has('register'))
        <div class="text-center mt-3">
            <p class="small text-muted mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">Daftar di sini</a></p>
        </div>
        @endif
    </form>
</x-guest-layout>
