<section>
    <header class="mb-4">
        <h4 class="fw-bold text-primary-custom">{{ __('Perbarui Kata Sandi') }}</h4>
        <p class="text-secondary-custom small">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-semibold text-primary-custom">{{ __('Kata Sandi Saat Ini') }}</label>
            <div class="input-group">
                <input id="update_password_current_password" name="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="togglePasswordVisibility('update_password_current_password', 'toggleCurrentPasswordIcon')">
                        <i class="fas fa-eye" id="toggleCurrentPasswordIcon"></i>
                    </button>
                </div>
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-semibold text-primary-custom">{{ __('Kata Sandi Baru') }}</label>
            <div class="input-group">
                <input id="update_password_password" name="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="togglePasswordVisibility('update_password_password', 'toggleNewPasswordIcon')">
                        <i class="fas fa-eye" id="toggleNewPasswordIcon"></i>
                    </button>
                </div>
                @error('password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label fw-semibold text-primary-custom">{{ __('Konfirmasi Kata Sandi') }}</label>
            <div class="input-group">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="togglePasswordVisibility('update_password_password_confirmation', 'toggleConfirmUpdatePasswordIcon')">
                        <i class="fas fa-eye" id="toggleConfirmUpdatePasswordIcon"></i>
                    </button>
                </div>
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-primary fw-semibold px-4">{{ __('Simpan') }}</button>

            @if (session('status') === 'password-updated')
                <span class="text-success small fw-semibold fade-out-message">
                    <i class="bi bi-check-circle me-1"></i> {{ __('Tersimpan.') }}
                </span>
            @endif
        </div>
    </form>
</section>
