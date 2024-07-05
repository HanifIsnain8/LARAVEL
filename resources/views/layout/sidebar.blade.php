  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route ('home') }}" class="brand-link">
      <span class="brand-text font-weight-light">SPK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route ('home') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>HOME</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('alternatif.index') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>ALTERNATIF</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('kriteria.index') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>KRITERIA</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('nilai.index') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>NILAI</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('hasil') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>HASIL</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
