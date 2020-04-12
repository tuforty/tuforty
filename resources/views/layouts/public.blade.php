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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:500,500i,700,700i|Roboto+Slab:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('shared.drift')
</head>
<body>
    <div id="app">
        <main class="content">
            <section class="hero is-dark is-large">
                <div class="hero-head">
                    @include('shared.navbar')
                </div>
                <div class="hero-body">
                    @yield('navbar-hero-body')
                </div>
            </section>
            
            <div>
                @yield('content')
            </div>
            
            @include('shared.footer') 
        </main>
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
