  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          {{-- <img src="{{ Auth::user()->profile_picture_url }}" class="user-image img-circle elevation-2" alt="User Image"> --}}
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            {{-- <img src="{{ Auth::user()->profile_picture_url }}" class="img-circle elevation-2" alt="User Image"> --}}
          
            <p>
              {{ Auth::user()->name }} - {{ Auth::user()->occupation }}
              <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
            </p>
          </li>
          <li class="user-footer">
            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-flat float-right">KELUAR</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->
