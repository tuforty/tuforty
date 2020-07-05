@extends('layouts.register')

@section('content')
<form class="register__form" method="POST" action="{{ route('register') }}">
  <h1>Create a Tuforti account</h1>
  @csrf
    <label for="name">Full name</label>
    <input
      id="name"
      class="input input--border fullWidth @error('name') input--error @enderror"
      name="name"
      placeholder="Your full name"
      value="{{ old('name') }}"
      required
      autofocus
    />
    @error('name')
    <span class="input__error-message" role="alert">
      {{ $message }}
    </span>
    @enderror

    <label for="email">Email</label>
    <input
      id="email"
      type="email"
      class="input input--border fullWidth @error('email') input--error @enderror"
      name="email"
      placeholder="Your email address"
      value="{{ old('email') }}"
      required
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
      class="input input--border fullWidth @error('password') input--error @enderror"
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

    <label for="password-confirmation">Password</label>
    <input
      id="password-confirmation"
      type="password"
      class="input input--border fullWidth @error('password_confimation') input--error @enderror"
      name="password_confirmation"
      placeholder="Confirm Password"
      required
      autocomplete="current-password"
    />
    @error('password_confirmation')
    <span class="input__error-message" role="alert">
      {{ $message }}
    </span>
    @enderror
  <button type="submit" class="button button--round fullWidth">
    Create Account
  </button>
  <a class="button button--link fullWidth" href="{{ route('login') }}">
    Have an account ?
  </a>
</form>
<div class="register__site-info">
  <img src="{{ asset('img/logo.svg') }}" alt="Logo" width="300" height="300">
  <p>
    Build on our well thought out APIs to improve the level of internationalization you give
    to your customers and never have to worry where your users are coming from.
  </p>
</div>
@endsection
