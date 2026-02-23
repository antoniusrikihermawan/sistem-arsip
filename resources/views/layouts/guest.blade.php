<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Pengarsipan Surat') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
            background: #fff;
            padding: 2rem;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 2rem;
            margin: 0 auto 1.5rem auto;
            background-color: var(--bs-primary);
            color: #fff;
            background: linear-gradient(90deg, var(--bs-primary) 0%, rgba(13, 110, 253, 0.8) 100%);
        }
        
        .login-logo-img {
            height: 80px;
            width: auto;
            max-width: 250px;
            object-fit: contain;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="text-center mb-4">
            <a href="/" class="text-decoration-none">
                <img src="{{ asset('logo.png') }}" onerror="this.style.display='none'; document.getElementById('fallback-logo').style.display='flex';" alt="Logo Arsip Surat" class="login-logo-img">
                <!-- Fallback in case logo.png doesn't exist -->
                <div class="logo-icon" id="fallback-logo" style="display: none;">
                    <i class="bi bi-envelope-paper-fill m-0"></i>
                </div>
                <h4 class="fw-bold text-dark mt-2 mb-0">Arsip Surat</h4>
            </a>
        </div>

        {{ $slot }}
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>
