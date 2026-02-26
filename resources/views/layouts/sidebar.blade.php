  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('logo.png') }}" onerror="this.src='https://ui-avatars.com/api/?name=Arsip+Surat&background=0D8ABC&color=fff';" alt="Logo Arsip" class="brand-image" style="opacity: .9; border-radius: 4px; max-height: 35px; width: auto; object-fit: contain;">
      <span class="brand-text font-weight-light">Arsip Surat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name ?? 'User Name' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-header">SURAT</li>
          
          <li class="nav-item">
            <a href="{{ route('surat-masuk.index') }}" class="nav-link {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-inbox"></i>
              <p>Surat Masuk</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('surat-keluar.index') }}" class="nav-link {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>Surat Keluar</p>
            </a>
          </li>

          <li class="nav-header">PENGATURAN</li>
          
          <li class="nav-item">
            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil Saya</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.create') }}" class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Tambah Akun</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
