<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-store"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SiToko</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Dashboard -->
  <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Products -->
  <li class="nav-item {{ request()->routeIs('products*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-fw fa-boxes"></i>
      <span>Products</span>
    </a>
  </li>

  <!-- Categories -->
  <li class="nav-item {{ request()->routeIs('categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categories') }}">
      <i class="fas fa-fw fa-tags"></i>
      <span>Categories</span>
    </a>
  </li>

  <!-- Transaksi Penjualan -->
  <li class="nav-item {{ request()->routeIs('sales*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sales') }}">
      <i class="fas fa-fw fa-cash-register"></i>
      <span>Transaksi Penjualan</span>
    </a>
  </li>

  <!-- Laporan Penjualan -->
<li class="nav-item {{ request()->routeIs('sales.report.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sales.report.form') }}">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Laporan Penjualan</span>
    </a>
</li>

  <!-- Profile -->
  <li class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('profile') }}">
      <i class="fas fa-fw fa-user-circle"></i>
      <span>Profile</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
