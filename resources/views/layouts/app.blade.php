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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
      <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('shared.drift')
</head>
<body>
    <div class="app">
      @include('shared.sidebar')
      <main class="app__content">
        @yield('content')
      </main>
    </main>

<!-- Scripts -->
@if (config('APP_ENV') === 'local')
    <script src="{{ mix('js/app.js') }}"></script>
@else
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
@endif

@yield('scripts')
</body>
</html>
