<nav class="navbar is-fixed-top has-background-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        @auth
            <a class="navbar-item hax-text-white" href="{{ url('/dashboard') }}">
                <img src="https://bulma.io/images/bulma-logo-white.png" width="112" height="28" alt="Bulma">
                {{-- {{ env('APP_NAME', 'Laravel') }} --}}
            </a>
        @else    
            <a class="navbar-item hax-text-white" href="{{ url('/') }}">
                <img src="https://bulma.io/images/bulma-logo-white.png" width="112" height="28" alt="Bulma">
                {{-- {{ env('APP_NAME', 'Laravel') }} --}}
            </a>
        @endauth

        <a role="button" :class="['navbar-burger burger', { 'is-active': mobileMenuOpen }]" aria-label="menu" aria-expanded="false" data-target="primary-nav" @click="toggleMobileMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="primary-nav" class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @auth
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }}
                            </a>
                            
                            <div class="navbar-dropdown">
                                <a class="navbar-item is-active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout    
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        
                    @else
                        @if (Route::has('register'))
                            <a class="button is-primary" href="{{ route('register') }}">
                                <strong>Register</strong>
                            </a>
                        @endif
                        <a class="button is-success" href="{{ route('login') }}">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
