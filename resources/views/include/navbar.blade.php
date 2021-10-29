<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if(auth()->user()->level == 'admin')
      <figure class="avatar mr-2 avatar-sm">
        <img alt="image" src="{{ asset('/uploads/admin/'.auth()->user()->avatar ) }}">
      </figure>
      @elseif(auth()->user()->level == 'kepsek')
      <figure class="avatar mr-2 avatar-sm">
        <img alt="image" src="{{ asset('/uploads/kepsek/'.auth()->user()->avatar ) }}">
      </figure>
      
      @elseif(auth()->user()->level == 'guru')
      <figure class="avatar mr-2 avatar-sm">
        <img alt="image" src="{{ asset('/uploads/guru/'.auth()->user()->avatar ) }}">
      </figure>
      
      @elseif(auth()->user()->level == 'murid')
      <figure class="avatar mr-2 avatar-sm">
        <img alt="image" src="{{ asset('/uploads/murid/'.auth()->user()->avatar ) }}">
      </figure>
      @endif
      <div class="d-sm-none d-lg-inline-block">Halo, {{ auth()->user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/profil" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profil
        </a>
        <a href="/akun" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Akun
        </a>
        <div class="dropdown-divider"></div>
        <form action="{{ url('/logout') }}" method="POST">
          @csrf
          <button type="submit" class="dropdown-item text-danger">Logout</button>
        </form>
        {{-- <a href="#" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a> --}}
      </div>
    </li>
  </ul>
</nav>