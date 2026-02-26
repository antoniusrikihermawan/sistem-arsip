<x-guest-layout>
    @section('page-title', 'Reset Kata Sandi')

    <h4 class="auth-heading">Atur Ulang Kata Sandi</h4>
    <p class="auth-subheading">Masukkan kata sandi baru Anda di bawah ini.</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email', $request->email) }}"
                   placeholder="nama@email.com"
                   required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi Baru</label>
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
                   name="password_confirmation" placeholder="Ulangi kata sandi baru"
                   required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login mb-3">
            <i class="fas fa-key me-1"></i> Atur Ulang Kata Sandi
        </button>

        <p class="text-center text-muted small mb-0">
            <a href="{{ route('login') }}" class="auth-footer-link">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Login
            </a>
        </p>
    </form>
</x-guest-layout>
