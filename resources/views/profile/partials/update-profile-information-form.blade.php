<section>
    <header class="mb-4">
        <h4 class="fw-bold text-primary-custom">{{ __('Informasi Profil') }}</h4>
        <p class="text-secondary-custom small">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold text-primary-custom">{{ __('Nama') }}</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fw-semibold text-primary-custom">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-warning small mb-1">
                        <i class="bi bi-exclamation-triangle me-1"></i> {{ __('Alamat email Anda belum diverifikasi.') }}
                    </p>
                    <button form="send-verification" class="btn btn-link p-0 small text-decoration-none">
                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success small fw-semibold">
                            <i class="bi bi-check-circle me-1"></i> {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-primary fw-semibold px-4">{{ __('Simpan') }}</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small fw-semibold fade-out-message">
                    <i class="bi bi-check-circle me-1"></i> {{ __('Tersimpan.') }}
                </span>
            @endif
        </div>
    </form>
</section>

@push('styles')
<style>
    .fade-out-message {
        animation: fadeOut 2.5s forwards;
    }
    @keyframes fadeOut {
        0% { opacity: 1; }
        70% { opacity: 1; }
        100% { opacity: 0; }
    }
</style>
@endpush
