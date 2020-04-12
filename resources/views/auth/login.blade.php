@extends('layouts.auth') @section('content')
  <form class="auth__form" method="POST" action="{{ route('login') }}">
    <h1>Sign into Tuforti</h1>
    @csrf
      <label for="email">Email</label>
      <input
        id="email"
        type="email"
        class="input fullWidth @error('email') input--error @enderror"
        name="email"
        placeholder="Your email address"
        value="{{ old('email') }}"
        required
        autocomplete="email"
        autofocus
      />
      @error('email')
      <span class="input__error-message" role="alert">
        {{ $message }}
      </span>
      @enderror

      <label for="password">Password</label>
      <input
        id="password"
        type="password"
        class="input fullWidth @error('password') input--error @enderror"
        name="password"
        placeholder="Your password"
        required
        autocomplete="current-password"
      />
      @error('password')
      <span class="input__error-message" role="alert">
        {{ $message }}
      </span>
      @enderror

    {{-- <div class="field">
      <label class="checkbox">
        <input type="checkbox" name="remember" id="remember"
        {{ old("remember") ? "checked" : "" }}> Remember me
      </label>
    </div> --}}

    {{-- <div>
      @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __("Forgot Your Password?") }}
      </a>
      @endif
    </div> --}}
    <button type="submit" class="button button--round fullWidth">
      Sign in
    </button>
  </form>
@endsection
