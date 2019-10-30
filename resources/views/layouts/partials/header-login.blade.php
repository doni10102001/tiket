<nav class="navbar navbar-expand-md navbar-dark" id="navbar2">

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
        <a class="nav-link" href="" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i> Login</a>
      </li>
      @endguest
  </ul>
</div> 
</nav>