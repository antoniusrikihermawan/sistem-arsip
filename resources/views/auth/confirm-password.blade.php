<x-guest-layout>
    <div class="mb-4 text-center">
        <h3 class="fw-bold mb-1">{{ __('Area Aman') }}</h3>
        <p class="text-muted small">
            {{ __('Ini adalah area aman dari aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">{{ __('Kata Sandi') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary fw-semibold py-2">
                {{ __('Konfirmasi') }}
            </button>
        </div>
    </form>
</x-guest-layout>
