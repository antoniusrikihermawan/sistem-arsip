document.addEventListener("DOMContentLoaded", function() {
    // ----------------------------------------------------------------------
    // SWEETALERT2 CONFIGURATION
    // ----------------------------------------------------------------------
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    // We expose Toast globally so Blade views can use it
    window.Toast = Toast;

    // ----------------------------------------------------------------------
    // THEME TOGGLE LOGIC
    // ----------------------------------------------------------------------
    const toggleButton = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const bodyTag = document.body;
    const currentTheme = localStorage.getItem('theme');
    const topNavbar = document.getElementById('top-navbar');

    // Restore theme on load
    if (currentTheme === 'dark') {
        bodyTag.classList.add('dark-mode');
        if (themeIcon) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
            themeIcon.classList.add('text-warning');
        }
        if (topNavbar) {
            topNavbar.classList.remove('navbar-white', 'navbar-light');
            topNavbar.classList.add('navbar-dark');
        }
    }

    if (toggleButton) {
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            bodyTag.classList.toggle('dark-mode');
            
            if (bodyTag.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                if (themeIcon) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    themeIcon.classList.add('text-warning');
                }
                if (topNavbar) {
                    topNavbar.classList.remove('navbar-white', 'navbar-light');
                    topNavbar.classList.add('navbar-dark');
                }
            } else {
                localStorage.setItem('theme', 'light');
                if (themeIcon) {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.remove('text-warning');
                    themeIcon.classList.add('fa-moon');
                }
                if (topNavbar) {
                    topNavbar.classList.remove('navbar-dark');
                    topNavbar.classList.add('navbar-white', 'navbar-light');
                }
            }
        });
    }
});

// ----------------------------------------------------------------------
// GLOBAL FUNCTIONS
// ----------------------------------------------------------------------

// Confirm Logout Form Submission
function confirmLogout(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan keluar dari sesi ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
}

// Confirm Delete Form Submission
function confirmDelete(event, title = 'Yakin ingin menghapus data ini?') {
    event.preventDefault();
    Swal.fire({
        title: title,
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
}

// Toggle Password Visibility Tracker
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
