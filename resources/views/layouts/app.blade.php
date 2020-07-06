<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('shared.analytics')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Meta Tags -->
    @yield('meta-tags')

    <title>{{ config('app.name', 'Laravel') }} | Currency Translation</title>

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
      <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('shared.drift')
</head>
<body>
  <div id="app" class="app">
    @include('shared.sidebar')
    <main class="app__content">
      @yield('content')
    </main>
  </div>

<!-- Scripts -->
@if (env('app.env') === 'local')
  <script src="{{ mix('js/app.js') }}"></script>
@else
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
@endif
  <script>

    const sideBar = document.querySelector(".app__sidebar");
    const sideBarToggle = document.querySelector(".app__sidebar-toggle");

    function toggleSideBar() {
      if(sideBar.classList.contains("open")) {
        sideBarToggle.querySelector("ion-icon").setAttribute("name", "menu");
      } else {
        sideBarToggle.querySelector("ion-icon").setAttribute("name", "close");
      }
      sideBar.classList.toggle("open")
      sideBarToggle.classList.toggle("close")
    }

    sideBarToggle.addEventListener("click", toggleSideBar);

  </script>


  @yield('scripts')
  </body>
</html>
