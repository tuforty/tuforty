<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Meta Tags -->
    @yield('meta-tags')

    <title>{{ config('app.name', 'Tuforti') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('shared.drift')
</head>
<body>
    <div id="app" class="landing">
      @include('shared.navbar')
      @yield('content')
      @include('shared.footer')
    </div>

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
