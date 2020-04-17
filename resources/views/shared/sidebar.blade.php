<aside class="app__sidebar">
  <div class="app__sidebar__avatar-container">
    <img src="https://api.adorable.io/avatars/285/{{ Auth::user()->email }}" alt="" class="app__sidebar__avatar">
    <span class="app__sidebar__username">{{ Auth::user()->name }}</span>
    <span class="app__sidebar__email">{{ Auth::user()->email }}</span>
  </div>
  <ul class="app__sidebar__links">
    <li>
      <a href="/dashboard" class="{{ Request::path() ==  'dashboard' ? 'active' : '' }}">
        <ion-icon name="time" size="large"></ion-icon>
        <span>Activity</span>
      </a>
    </li>
    <li>
      <a href="/dashboard/keys" class="{{ Request::path() ==  'dashboard/keys' ? 'active' : '' }}">
        <ion-icon name="key" size="large"></ion-icon>
        <span>API key</span>
      </a>
    </li>
    <li>
      <a href="/dashboard/billing" class="{{ Request::path() ==  'dashboard/billing' ? 'active' : '' }}">
        <ion-icon name="card" size="large"></ion-icon>
        <span>Billing</span>
      </a>
    </li>
    <li>
      <a href="{{ route('logout') }}">
        <ion-icon name="remove-circle-outline" size="large"></ion-icon>
        <span>Sign out</span>
      </a>
    </li>
  </ul>
</aside>
