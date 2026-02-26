<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Arsip Surat') }} | @yield('page-title', 'Login')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Auth Page Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-wrapper">
    <!-- Left Panel: Form -->
    <div class="auth-left">
        <div class="auth-form-container">
            <!-- Brand -->
            <div class="auth-brand">
                <img src="{{ asset('logo.png') }}"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                     alt="Logo">
                <div class="auth-brand-fallback" style="display:none;">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="auth-brand-text">
                    Arsip Surat
                    <small>Sistem Pengarsipan Surat</small>
                </div>
            </div>

            {{ $slot }}
        </div>
    </div>

    <!-- Right Panel: Illustration -->
    <div class="auth-right">
        <div class="auth-right-content">
            <div class="auth-illustration">
                <img src="{{ asset('vector-surat.png') }}" alt="Ilustrasi Arsip Surat" style="width: 100%; max-width: 380px; height: auto;">
            </div>
            <h3>Kelola Arsip Surat Anda</h3>
            <p>Sistem manajemen surat masuk &amp; keluar yang aman, terorganisir, dan mudah diakses kapan saja.</p>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Auth Page Scripts -->
<script src="{{ asset('js/auth.js') }}"></script>

</body>
</html>
