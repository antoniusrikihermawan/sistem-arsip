<x-guest-layout>
    <div class="mb-4 text-center">
        <h3 class="fw-bold mb-1">{{ __('Verifikasi Email') }}</h3>
    </div>

    <div class="mb-4 text-sm text-muted text-center">
        {{ __('Terima kasih telah mendaftar! Sebelum memulai, dapatkah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan yang lain.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mt-3 small" role="alert">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
        </div>
    @endif

    <div class="d-grid mt-4 mb-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary fw-semibold py-2 w-100">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </button>
        </form>
    </div>

    <div class="text-center mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none text-muted small p-0">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
