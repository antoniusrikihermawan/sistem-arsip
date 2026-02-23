<nav class="navbar navbar-expand-lg top-navbar">
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center gap-3">
            <!-- Sidebar Toggle Button -->
            <button class="btn btn-icon-custom sidebar-toggle d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px;">
                <i class="bi bi-list fs-5 text-secondary-custom"></i>
            </button>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="d-none d-md-block mt-1">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-secondary-custom"><i class="bi bi-house-door-fill"></i></a></li>
                    <li class="breadcrumb-item active fw-medium text-primary-custom" aria-current="page">@yield('title', 'Dashboard')</li>
                </ol>
            </nav>
        </div>

        <!-- Right Side Nav -->
        <div class="ms-auto d-flex align-items-center gap-2">
            
            <!-- Global Search -->
            <div class="d-none d-md-block position-relative me-2">
                <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-secondary-custom"></i>
                <input type="text" class="form-control ps-5 rounded-pill" placeholder="Cari arsip..." style="width: 250px;">
            </div>

            <!-- Theme Toggle -->
            <button id="theme-toggle" class="btn btn-icon-custom rounded-circle d-flex align-items-center justify-content-center" type="button" style="width: 40px; height: 40px;">
                <i class="bi bi-moon-fill fs-5 text-secondary-custom" id="theme-icon"></i>
            </button>

            <!-- Notifications -->
            <div class="dropdown">
                <button class="btn btn-icon-custom rounded-circle position-relative d-flex align-items-center justify-content-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px;">
                    <i class="bi bi-bell fs-5 text-secondary-custom"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="border-color: var(--bg-card) !important;">
                        <span class="visually-hidden">Notifikasi baru</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 radius-12 p-3" style="width: 320px; border-radius: 12px;">
                    <li><h6 class="dropdown-header fw-bold px-2 mb-2">Notifikasi</h6></li>
                    <li>
                        <a class="dropdown-item px-2 py-2 rounded-3 d-flex align-items-start gap-3 mb-1" href="#">
                            <div class="bg-primary-soft rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-file-earmark"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-medium fs-6 text-wrap text-primary-custom">Surat Masuk Baru ditambahkan</p>
                                <small class="text-secondary-custom">2 menit yang lalu</small>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-center fw-medium py-2" href="#" style="color: var(--bs-primary);">Lihat Semua Notifikasi</a></li>
                </ul>
            </div>

            <div class="vr mx-1 bg-card border-custom" style="width: 1px;"></div>

            <!-- User Dropdown -->
            <div class="dropdown">
                <button class="btn btn-icon-custom d-flex align-items-center gap-2 border-0 bg-transparent px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px;">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=2563eb&color=fff&rounded=true" alt="Profile" width="36" height="36" class="rounded-circle shadow-sm">
                    <div class="text-start d-none d-md-block">
                        <span class="d-block fw-semibold text-primary-custom mb-0" style="font-size: 0.875rem;">{{ Auth::user()->name ?? 'User' }}</span>
                    </div>
                    <i class="bi bi-chevron-down ms-1 fs-7 text-secondary-custom d-none d-md-block"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow mt-2 py-2" style="border-radius: 12px; min-width: 200px;">
                    <li>
                        <div class="px-4 py-2 mb-1 d-md-none">
                            <span class="d-block fw-bold text-primary-custom">{{ Auth::user()->name ?? 'User' }}</span>
                            <span class="d-block fs-7 text-secondary-custom">{{ Auth::user()->email ?? 'user@example.com' }}</span>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2 px-4" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person me-3 text-secondary-custom fs-5"></i>
                            <span class="fw-medium">Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2 px-4" href="#">
                            <i class="bi bi-gear me-3 text-secondary-custom fs-5"></i>
                            <span class="fw-medium">Pengaturan Akun</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-2 opacity-10"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center py-2 px-4 text-danger">
                                <i class="bi bi-box-arrow-right me-3 fs-5"></i>
                                <span class="fw-medium">Keluar</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
