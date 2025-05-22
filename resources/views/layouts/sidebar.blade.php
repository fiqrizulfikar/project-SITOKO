<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-store"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SiToko</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Dashboard</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>

<!-- Custom CSS -->
<style>
  /* Ganti warna latar belakang sidebar menjadi biru */
  .bg-gradient-success {
    background-color: #007BFF !important; /* Ganti dengan warna biru yang diinginkan */
    background-image: none; /* Menghilangkan gradient */
  }

  /* Ganti warna ikon menjadi putih */
  .sidebar .nav-link i {
    color: #ffffff; /* Ikon berwarna putih */
  }

  /* Ganti warna teks di sidebar menjadi putih untuk link biasa */
  .sidebar .nav-link span {
    color: #ffffff; /* Teks berwarna putih */
  }

  /* Hover efek pada link sidebar */
  .sidebar .nav-link:hover {
    color: #007BFF; /* Teks berwarna biru saat hover */
  }

  /* Menandai link yang aktif (menu yang sedang aktif) */
  .sidebar .nav-item.active .nav-link {
    background-color: #ffffff; /* Latar belakang putih saat item aktif */
    color: #007BFF; /* Teks berwarna biru saat item aktif */
  }

  /* Ganti warna untuk brand di sidebar */
  .sidebar-brand-text {
    color: #ffffff; /* Teks brand berwarna putih */
  }

  .sidebar-brand-icon {
    color: #ffffff; /* Ikon brand berwarna putih */
  }

  /* Ganti warna tombol sidebar toggle */
  #sidebarToggle {
    background-color: #007BFF; /* Tombol toggle berwarna biru */
    border-color: #fff;
  }

  #sidebarToggle:hover {
    background-color: #fff;
    border-color: #007BFF;
  }
</style>
