<x-guest-layout>
    @section('page-title', 'Login')

    <h4 class="auth-heading">Selamat Datang</h4>
    <p class="auth-subheading">Silakan masuk untuk mengakses aplikasi</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}"
                   placeholder="nama@email.com"
                   required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-group">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       placeholder="Masukkan kata sandi"
                       required autocomplete="current-password">
                <button class="btn btn-eye" type="button" id="togglePassword">
                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me & Forgot -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label small text-muted" for="remember_me">Ingat saya</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-footer-link" style="font-size:0.85rem;">Lupa kata sandi?</a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-login mb-3">
            <i class="fas fa-sign-in-alt me-1"></i> Masuk
        </button>

    </form>
</x-guest-layout>
