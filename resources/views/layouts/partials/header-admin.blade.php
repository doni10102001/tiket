<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tiket <sup>Online</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading text-white">
        Master Data
      </div>

      <!-- Nav Item - Pengaturan User Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.manage-member') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Pengaturan User</span>
        </a>
      </li>

      <!-- Nav Item - Pengaturan Tiket Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaturan Tiket</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaturan Tiket:</h6>
            <a class="collapse-item" href="{{ route('admin.manage-ticket') }}">Tiket</a>
            <a class="collapse-item" href="{{ route('admin.manage-category') }}">Kategori</a>
            <a class="collapse-item" href="{{ route('admin.manage-maskapai') }}">Maskapai</a>
            <a class="collapse-item" href="{{ route('admin.manage-reservation') }}">Reservasi</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading text-white">
        Lainnya
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.manage-info') }}">
          <i class="fas fa-fw fa-bell"></i>
          <span>Pemberitahuan</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.manage-message') }}">
          <i class="fas fa-envelope-open-text fa-fw"></i>
          <span>Pesan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">

  <!-- Brand -->
  
  <a class="navbar-brand" href="#"><i class="fa fa-plane"></i> DTicket</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="/admin"><i class="fa fa-home"></i> Beranda</a>
      </li>
     
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         {{Auth::guard('admin')->user()->name}}<span class="caret"></span>
       </a>

       <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a href="{{route('admin.profile', (Auth::guard('admin')->user()->id))}}" class="dropdown-item"><i class="fa fa-user"></i> {{__('Profile Saya')}}</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off"></i> {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    
  </li>
   <button type="button" id="sidebarCollapse" class="btn btn-secondary">
        <span class="navbar-toggler-icon"></span>
    </button>
</ul>
</div> 
</nav> --}}