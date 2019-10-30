<nav class="navbar navbar-expand-md navbar-light bg-light">

  <!-- Brand -->
  <a class="navbar-brand" href="#"><i class="fa fa-plane"></i> DTicket</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item">
        <a class="nav-link" href="/"><i class="fa fa-home"></i>Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a>
      </li>
      @if(Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}"><i class="fa fa-key"></i> Daftar</a>
      </li>
      @endif
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home"></i>Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.cari-tiket')}}"><i class="fa fa-search"></i> Cari Tiket</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.tiket-saya.all')}}"><i class="fa fa-shopping-cart"></i> Tiket Saya</a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           <img src="{{asset('upload/' . Auth::user()->photo)}}" class="rounded-circle" width="30" height="20"> {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="{{route('user.profile', (Auth::user()->id))}}" class="dropdown-item"><i class="fa fa-user"></i> {{__('Profile Saya')}}</a>
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
    @endguest
  </ul>
</div> 
</nav>