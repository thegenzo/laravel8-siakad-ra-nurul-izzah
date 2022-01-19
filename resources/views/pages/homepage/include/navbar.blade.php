<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><img src="{{ asset('/assets/img/logo.png') }}" alt=""></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
        <li class="dropdown"><a href="#"><span>Informasi RA</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/profil-tk">Profil</a></li>
            <li><a href="/visi-misi">Visi Misi dan Tujuan</a></li>
            <li><a href="/struktur-organisasi">Struktur Organisasi</a></li>
          </ul>
        </li>
        <li><a class="{{ Request::is('data-guru') ? 'active' : '' }}" href="/data-guru">Data GTK</a></li>
        <li><a class="{{ Request::is('baca-artikel') ? 'active' : '' }}" href="/baca-artikel">Baca Artikel</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="/login" class="get-started-btn">Login</a>

  </div>
</header><!-- End Header -->