  <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="top-navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Theme Toggle Button -->
      <li class="nav-item">
        <a class="nav-link" href="#" id="theme-toggle" role="button" title="Toggle Dark/Light Mode">
          <i class="fas fa-moon" id="theme-icon"></i>
        </a>
      </li>

      <!-- User Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> {{ Auth::user()->name ?? 'User' }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Profile</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Edit Profile
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="confirmLogout(event)">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          </form>
        </div>
      </li>
    </ul>
  </nav>
