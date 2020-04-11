@extends('layouts.app') @section('content')
<div class="container mt-6 mb-6">
  <form class="box " method="POST" action="{{ route('login') }}">
    @csrf

    {{-- <div class="field has-text-centered">
      <img src="images/logo.png" width="167" />
    </div> --}}
    
    <div class="field">
      <label class="label">Email</label>
      <div class="control has-icons-left">
        <input
          id="email"
          type="email"
          class="input"
          name="email"
          value="{{ old('email') }}"
          required
          autocomplete="email"
          autofocus
        />
        <span class="icon is-small is-left">
          <i class="fa fa-envelope"></i>
        </span>
      </div>

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="field">
      <label class="label">Password</label>
      <div class="control has-icons-left">
        <input
          id="password"
          type="password"
          class="input form-control @error('password') is-invalid @enderror"
          name="password"
          required
          autocomplete="current-password"
        />
        <span class="icon is-small is-left">
          <i class="fa fa-lock"></i>
        </span>
      </div>

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="field">
      <label class="checkbox">
        <input type="checkbox" name="remember" id="remember"
        {{ old("remember") ? "checked" : "" }}> Remember me
      </label>
    </div>

    <div>
      @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __("Forgot Your Password?") }}
      </a>
      @endif
    </div>

    <div class="field">
      <button type="submit" class="button is-success">
        Login
      </button>
    </div>
  </form>
</div>
@endsection
