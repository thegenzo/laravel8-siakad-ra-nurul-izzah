<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; SIAKAD RA Nurul Izzah</title>

  @include('include.style')

  @stack('addon-style')

  
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('include.navbar')

      @include('include.sidebar')

      @yield('content')

      @include('include.footer')
    </div>
  </div>

  @include('include.script')

  @stack('addon-script')
  
</body>
</html>
