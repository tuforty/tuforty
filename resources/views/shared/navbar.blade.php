<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        @auth
            <a class="navbar-item" href="{{ url('/dashboard') }}">
                {{ env('APP_NAME', 'Laravel') }}
            </a>
        @else    
            <a class="navbar-item" href="{{ url('/') }}">
                {{ env('APP_NAME', 'Laravel') }}
            </a>
        @endauth

        <a role="button" :class="['navbar-burger burger', { 'is-active': mobileMenuOpen }]" aria-label="menu" aria-expanded="false" data-target="primary-nav" @click="toggleMobileMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="primary-nav" :class="['navbar-menu', { 'is-active': mobileMenuOpen }]">
        <div class="navbar-start">
            
        </div>

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
                            <a class="button is-primary is-small" href="{{ route('register') }}">
                                <strong>Register</strong>
                            </a>
                        @endif
                        <a class="button is-light is-small" href="{{ route('login') }}">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
