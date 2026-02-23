<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="fw-bold mb-1">{{ __('Buat Akun') }}</h3>
        <p class="text-muted small">{{ __('Bergabunglah dengan kami sekarang! Masukkan detail Anda di bawah ini.') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">{{ __('Nama') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">{{ __('Kata Sandi') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">{{ __('Konfirmasi Kata Sandi') }}</label>
            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary fw-semibold py-2">
                {{ __('Daftar') }}
            </button>
        </div>

        <div class="text-center mt-3">
            <p class="small text-muted mb-0">{{ __('Sudah terdaftar?') }} <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Masuk</a></p>
        </div>
    </form>
</x-guest-layout>
