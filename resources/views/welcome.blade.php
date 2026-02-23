<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pengarsipan Surat</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 2rem;
            max-width: 800px;
        }
        .hero-icon {
            font-size: 5rem;
            margin-bottom: 2rem;
            text-shadow: 0 10px 20px rgba(0,0,0,0.1);
            animation: float 6s ease-in-out infinite;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 12px rgba(0,0,0,0.1);
            line-height: 1.2;
        }
        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 300;
            margin-bottom: 3rem;
            opacity: 0.9;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .action-buttons .btn {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .action-buttons .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        /* Decorative shapes background */
        .shape {
            position: absolute;
            opacity: 0.1;
            z-index: 1;
        }
        .shape-1 {
            width: 300px;
            height: 300px;
            background: white;
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }
        .shape-2 {
            width: 500px;
            height: 500px;
            background: white;
            border-radius: 50%;
            bottom: -200px;
            right: -100px;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

    <section class="hero-section">
        <!-- Floating decors -->
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>

        <div class="container hero-content">
            <div class="hero-icon">
                <i class="bi bi-envelope-paper-fill"></i>
            </div>
            
            <h1 class="hero-title">
                Selamat datang di website<br>Sistem Pengarsipan Berkas
            </h1>
            
            <p class="hero-subtitle">
                Kelola, simpan, dan temukan dokumen Anda dengan aman, cepat, dan mudah dalam satu platform terpusat.
            </p>

            <div class="action-buttons d-flex justify-content-center gap-3 flex-wrap">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light text-primary border-0">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light text-primary border-0">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light border-2">
                                Daftar Sekarang
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
