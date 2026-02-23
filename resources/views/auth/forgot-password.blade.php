<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="fw-bold mb-1">{{ __('Lupa Kata Sandi') }}</h3>
        <p class="text-muted small">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mt-4 mb-3">
            <button type="submit" class="btn btn-primary fw-semibold py-2">
                {{ __('Kirim Tautan Atur Ulang Kata Sandi') }}
            </button>
        </div>
        
        <div class="text-center mt-3">
            <p class="small text-muted mb-0"><a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Kembali ke Login</a></p>
        </div>
    </form>
</x-guest-layout>
