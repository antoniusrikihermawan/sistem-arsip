<x-guest-layout>
    @section('page-title', 'Konfirmasi Kata Sandi')

    <h4 class="auth-heading">Area Aman</h4>
    <p class="auth-subheading">Konfirmasi kata sandi Anda sebelum melanjutkan.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-group">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" placeholder="Masukkan kata sandi"
                       required autocomplete="current-password">
                <button class="btn btn-eye" type="button" id="togglePassword">
                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login">
            <i class="fas fa-check-circle me-1"></i> Konfirmasi
        </button>
    </form>
</x-guest-layout>
