<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel AdminLTE') }} | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Theme style AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  
  <style>
    /* Transisi smooth untuk topbar & body color jika berubah mode */
    body, .main-header, .navbar, .card, .btn {
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    /* Penyesuaian Dark Mode untuk Form, Card, dan Teks agar kontras */
    body.dark-mode .form-control {
        background-color: #343a40;
        color: #fff;
        border-color: #6c757d;
    }
    /* Mengubah warna icon kalender (date picker) menjadi putih di dark mode */
    body.dark-mode input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        opacity: 0.8;
    }
    body.dark-mode .form-control:focus {
        background-color: #495057;
        color: #fff;
        border-color: #80bdff;
    }
    body.dark-mode .text-dark {
        color: #f8f9fa !important;
    }
    body.dark-mode .text-muted {
        color: #adb5bd !important;
    }
    body.dark-mode .content-wrapper,
    body.dark-mode .main-footer {
        background-color: #212529; /* Background luar tabel/card lebih gelap agar batasnya jelas */
        color: #fff;
    }
    body.dark-mode .card {
        background-color: #343a40; /* Card lebih terang sedikit sehingga seakan-akan mengambang/punya batas */
        color: #fff;
        border: 1px solid #4f5962; /* Batas border solid-subtle */
    }
    body.dark-mode .card-header {
        border-bottom: 1px solid #4f5962;
    }
    body.dark-mode .table {
        color: #fff;
    }
    body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05); /* Belang-belang tabel dark mode */
    }
    body.dark-mode .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
  </style>
  
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title', 'Dashboard')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            @yield('content')
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ config('app.name', 'Laravel AdminLTE') }}</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Konfigurasi SweetAlert2 Toast
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

    // Menangkap session untuk Toast
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    @if(session('status'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('status') }}"
        });
    @endif

    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    @endif

    // Theme Toggle Logic
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const bodyTag = document.body;
        const currentTheme = localStorage.getItem('theme');

        const topNavbar = document.getElementById('top-navbar');

        // Restore theme on load
        if (currentTheme === 'dark') {
            bodyTag.classList.add('dark-mode');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
            themeIcon.classList.add('text-warning');
            if(topNavbar) {
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
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    themeIcon.classList.add('text-warning');
                    if(topNavbar) {
                        topNavbar.classList.remove('navbar-white', 'navbar-light');
                        topNavbar.classList.add('navbar-dark');
                    }
                } else {
                    localStorage.setItem('theme', 'light');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.remove('text-warning');
                    themeIcon.classList.add('fa-moon');
                    if(topNavbar) {
                        topNavbar.classList.remove('navbar-dark');
                        topNavbar.classList.add('navbar-white', 'navbar-light');
                    }
                }
            });
        }
    });

    // Script Konfirmasi Logout Global
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

    // Script Konfirmasi Hapus Global
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
    // Script Toggle Password Visibility Global
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
</script>

@yield('scripts')

</body>
</html>
