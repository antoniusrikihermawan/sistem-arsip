/**
 * Auth Page Scripts
 * Toggle password visibility untuk halaman login, register, dll.
 */
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-eye').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = this.closest('.input-group').querySelector('input');
            var icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
});
