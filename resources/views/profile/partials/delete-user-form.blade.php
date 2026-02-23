<section>
    <header class="mb-4">
        <h4 class="fw-bold text-danger">{{ __('Hapus Akun') }}</h4>
        <p class="text-muted small">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" id="delete-account-form" class="d-inline">
        @csrf
        @method('delete')
        <input type="hidden" name="password" id="hidden_password">
        <button type="button" class="btn btn-danger" onclick="confirmDeleteAccount()">
            <i class="fas fa-trash-alt mr-1"></i> {{ __('Hapus Akun') }}
        </button>
    </form>

    @if($errors->userDeletion->has('password'))
        <div class="text-danger mt-2 small">
            <i class="fas fa-exclamation-circle"></i> {{ $errors->userDeletion->first('password') }}
        </div>
    @endif
</section>

<script>
    function confirmDeleteAccount() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Setelah dihapus, semua data akan hilang permanen. Masukkan kata sandi Anda untuk konfirmasi.',
            icon: 'warning',
            html: `
                <div class="position-relative mt-3">
                    <input type="password" id="swal-input-password" class="swal2-input m-0" style="width: 100%; box-sizing: border-box;" placeholder="Masukkan Kata Sandi" autocapitalize="off" autocorrect="off">
                    <button type="button" class="btn btn-sm btn-light position-absolute border-0" 
                            style="right: 10px; top: 50%; transform: translateY(-50%); z-index: 10; background: transparent;"
                            onclick="toggleSwalPassword()">
                        <i class="fas fa-eye text-secondary" id="swal-password-icon"></i>
                    </button>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus Akun!',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const password = document.getElementById('swal-input-password').value;
                if (!password) {
                    Swal.showValidationMessage('Kata Sandi wajib diisi untuk keamanan!')
                }
                return password;
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                document.getElementById('hidden_password').value = result.value;
                document.getElementById('delete-account-form').submit();
            }
        });
    }

    function toggleSwalPassword() {
        const input = document.getElementById('swal-input-password');
        const icon = document.getElementById('swal-password-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
