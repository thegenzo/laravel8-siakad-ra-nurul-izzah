<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">
        <img src="{{ asset('/assets/img/logo.png') }}" style="width: 50px; height: 50px;" alt="">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">
        <img src="{{ asset('/assets/img/logo.png') }}" style="width: 50px; height: 50px;" alt="">
      </a>
    </div>
    <ul class="sidebar-menu">
        @if(auth()->user()->level == 'admin' || auth()->user()->level == 'kepsek')
        <li class="nav-item dropdown {{ Request::is('dashboard') || Request::is('admin-dashboard') ? ' active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('dashboard') ? ' active' : '' }}"><a class="nav-link" href="/dashboard">Dashboard</a></li>
            <li class="{{ Request::is('admin-dashboard') ? ' active' : '' }}"><a class="nav-link" href="/admin-dashboard">Admin Dashboard</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown {{ Request::is('admin') || Request::is('guru') || Request::is('murid') || Request::is('mapel') || Request::is('jadwal') ? ' active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('admin') ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.index') }}">Admin</a></li>
            <li class="{{ Request::is('guru') ? ' active' : '' }}"><a class="nav-link" href="{{ route('guru.index') }}">Guru</a></li>
            <li class="{{ Request::is('murid') ? ' active' : '' }}"><a class="nav-link" href="{{ route('murid.index') }}">Murid</a></li>
            <li class="{{ Request::is('mapel') ? ' active' : '' }}"><a class="nav-link" href="{{ route('mapel.index') }}">Mapel</a></li>
            <li class="{{ Request::is('jadwal') ? ' active' : '' }}"><a class="nav-link" href="{{ route('jadwal.index') }}">Jadwal</a></li>
          </ul>
        </li>
        <li class="{{ Request::is('pengumuman') ? ' active' : '' }}"><a class="nav-link" href="/pengumuman"><i class="fas fa-pencil-ruler"></i> <span>Pengumuman</span></a></li>
        <li class="nav-item dropdown {{ Request::is('nilai') || Request::is('sikap') || Request::is('ekskul') || Request::is('rapor') ? ' active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Penilaian</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('nilai') ? ' active' : '' }}"><a class="nav-link" href="{{ route('nilai.index') }}">Nilai</a></li>
            <li class="{{ Request::is('sikap') ? ' active' : '' }}"><a class="nav-link" href="{{ route('sikap.index') }}">Sikap</a></li>
            <li class="{{ Request::is('ekskul') ? ' active' : '' }}"><a class="nav-link" href="{{ route('ekskul.index') }}">Ekskul</a></li>
            <li class="{{ Request::is('rapor') ? ' active' : '' }}"><a class="nav-link" href="{{ route('rapor.index') }}">Rapor</a></li>
          </ul>
        </li>
        <li class="{{ Request::is('alumni') ? ' active' : '' }}"><a class="nav-link" href="/alumni"><i class="fas fa-exclamation"></i><span>Alumni RA</span></a></li>
        <li class="{{ Request::is('artikel') ? ' active' : '' }}"><a class="nav-link" href="/artikel"><i class="far fa-square"></i><span>Artikel</span></a></li>

        @elseif(auth()->user()->level == 'guru')
        <li class="{{ Request::is('dashboard') ? ' active' : '' }}"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
        <li class="nav-item dropdown {{ Request::is('nilai') || Request::is('sikap') || Request::is('rapor') ? ' active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Penilaian</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('nilai') ? ' active' : '' }}"><a class="nav-link" href="{{ route('nilai.index') }}">Entry Nilai Murid</a></li>
            <li class="{{ Request::is('sikap') ? ' active' : '' }}"><a class="nav-link" href="{{ route('sikap.index') }}">Entry Sikap Murid</a></li>
            <li class="{{ Request::is('rapor') ? ' active' : '' }}"><a class="nav-link" href="{{ route('rapor.index') }}">Entry Rapor Murid</a></li>
          </ul>
        </li>

        @elseif(auth()->user()->level == 'murid')
        <li class="{{ Request::is('dashboard') ? ' active' : '' }}"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
        <li class="{{ Request::is('rapor-saya') ? ' active' : '' }}"><a class="nav-link" href="/rapor-saya"><i class="far fa-file-alt"></i><span>Rapor Saya</span></a></li>
        @endif
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
          </ul>
        </li>
        <li class="menu-header">Stisla</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="components-article.html">Article</a></li>
            <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
            <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
            <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
            <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
            <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
            <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
            <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
            <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
            <li><a class="nav-link" href="components-tab.html">Tab</a></li>
            <li><a class="nav-link" href="components-table.html">Table</a></li>
            <li><a class="nav-link" href="components-user.html">User</a></li>
            <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
            <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
            <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
          <ul class="dropdown-menu">
            <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
            <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
            <li><a href="gmaps-geocoding.html">Geocoding</a></li>
            <li><a href="gmaps-geolocation.html">Geolocation</a></li>
            <li><a href="gmaps-marker.html">Marker</a></li>
            <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
            <li><a href="gmaps-route.html">Route</a></li>
            <li><a href="gmaps-simple.html">Simple</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
            <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
            <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
            <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
            <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
            <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
            <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
            <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
            <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
            <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
            <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
            <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
          </ul>
        </li>
        <li class="menu-header">Pages</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
          <ul class="dropdown-menu">
            <li><a href="auth-forgot-password.html">Forgot Password</a></li>
            <li><a href="auth-login.html">Login</a></li>
            <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
            <li><a href="auth-register.html">Register</a></li>
            <li><a href="auth-reset-password.html">Reset Password</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="errors-503.html">503</a></li>
            <li><a class="nav-link" href="errors-403.html">403</a></li>
            <li><a class="nav-link" href="errors-404.html">404</a></li>
            <li><a class="nav-link" href="errors-500.html">500</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="features-activities.html">Activities</a></li>
            <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
            <li><a class="nav-link" href="features-posts.html">Posts</a></li>
            <li><a class="nav-link" href="features-profile.html">Profile</a></li>
            <li><a class="nav-link" href="features-settings.html">Settings</a></li>
            <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
            <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
          <ul class="dropdown-menu">
            <li><a href="utilities-contact.html">Contact</a></li>
            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
            <li><a href="utilities-subscribe.html">Subscribe</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div> --}}
  </aside>
</div>