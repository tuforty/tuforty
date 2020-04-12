<nav class="landing__nav" aria-label="main navigation">
  <div class="landing__nav__content">
    <div class="landing__nav__icon ">
      <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="50" height="50">
      <p>
        {{ env('APP_NAME', 'Tuforti') }}
      </p>
    </div>
    <ul class="landing__nav__links">
      @auth
        <li class="landing__nav__link">{{ Auth::user()->name }}</li>
        <li class="landing__nav__link blue"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();>Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <li class="landing__nav__link"><a>Pricing</a></li>
        <li class="landing__nav__link"><a href="{{ route('login') }}">Login</a></li>
        @if (Route::has('register'))
          <li class="landing__nav__link"><a class="blue" href="{{ route('register') }}">Free Trial</a></li>
        @endif
      @endauth
    </ul>
  </div>
</nav>
