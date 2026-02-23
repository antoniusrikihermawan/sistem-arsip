<nav id="sidebar">
    <div class="sidebar-header d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-primary-custom text-decoration-none d-flex align-items-center gap-2">
            <div class="bg-primary-soft rounded p-1 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                <i class="bi bi-box-seam fs-5" style="color: var(--bs-primary);"></i>
            </div>
            <h5 class="mb-0 fw-bold fs-6">Sistem Arsip</h5>
        </a>
        <button class="btn btn-sm d-md-none sidebar-toggle text-secondary-custom border-0">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="list-unstyled components mb-4">
        <li class="px-3 mb-2 text-uppercase fw-bold" style="font-size: 0.75rem; color: var(--text-secondary); letter-spacing: 0.5px;">Menu Utama</li>
        
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i>
                Dashboard
            </a>
        </li>
        
        <!-- Modul Surat -->
        <li class="{{ request()->routeIs('surat.index') && request('jenis') == 'masuk' ? 'active' : '' }}">
            <a href="{{ url('surat?jenis=masuk') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                Surat Masuk
            </a>
        </li>
        <li class="{{ request()->routeIs('surat.index') && request('jenis') == 'keluar' ? 'active' : '' }}">
            <a href="{{ url('surat?jenis=keluar') }}">
                <i class="bi bi-box-arrow-up-right"></i>
                Surat Keluar
            </a>
        </li>
        <li class="{{ request()->routeIs('surat.index') && request('jenis') == 'disposisi' ? 'active' : '' }}">
            <a href="{{ url('surat?jenis=disposisi') }}">
                <i class="bi bi-arrow-return-right"></i>
                Disposisi
            </a>
        </li>
        <li class="{{ request()->routeIs('surat.index') && request('jenis') == 'arsip' ? 'active' : '' }}">
            <a href="{{ url('surat?jenis=arsip') }}">
                <i class="bi bi-archive"></i>
                Arsip
            </a>
        </li>

        <li class="px-3 mt-4 mb-2 text-uppercase fw-bold" style="font-size: 0.75rem; color: var(--text-secondary); letter-spacing: 0.5px;">Pengaturan</li>
        
        <li class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <a href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle"></i>
                Profil Saya
            </a>
        </li>
        <li class="{{ request()->routeIs('users.create') ? 'active' : '' }}">
            <a href="{{ route('users.create') }}">
                <i class="bi bi-people"></i>
                Tambah Pengguna
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-gear"></i>
                Pengaturan Sistem
            </a>
        </li>
    </ul>
    
    <div class="mt-auto p-3 m-3 rounded-3" style="background-color: var(--sidebar-hover-bg); border: 1px solid var(--border-color);">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-primary-soft rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <span class="fw-bold" style="color: var(--bs-primary);">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
            </div>
            <div class="overflow-hidden">
                <p class="mb-0 fw-medium text-truncate text-primary-custom" style="font-size: 0.9rem;">{{ Auth::user()->name ?? 'User' }}</p>
                <p class="mb-0 text-truncate text-secondary-custom" style="font-size: 0.75rem;">{{ Auth::user()->email ?? 'user@example.com' }}</p>
            </div>
        </div>
    </div>
</nav>
