<nav class="landing__nav" aria-label="main navigation">
  <div class="landing__nav__content">
    <div class="landing__nav__icon ">
      <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="50" height="50">
      <p>
        {{ env('APP_NAME', 'Tuforty') }}
      </p>
    </div>
    <ul class="landing__nav__links">
      <li class="landing__nav__link"><a href="https://docs.tuforty.com/">Documentation</a></li>
      <li class="landing__nav__link"><a href="#pricing">Pricing</a></li>
      @auth
        <li class="landing__nav__link"><a href="/dashboard">Dashboard</a></li>
      @else
        <li class="landing__nav__link"><a href="{{ route('login') }}">Login</a></li>
        @if (Route::has('register'))
          <li class="landing__nav__link" id="get-started"><a class="border" href="{{ route('register') }}">Get started</a></li>
        @endif
      @endauth
    </ul>
  </div>
</nav>
