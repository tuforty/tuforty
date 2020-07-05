@extends('layouts.auth')

@section('content')
<form class="login__form" method="POST" action="{{ route('login') }}">
    @csrf

    <a class="button button--link button--dark" href="/">&larr; Back</a>
    <h1>Sign in</h1>

    <label for="email">Email</label>
    <input id="email" type="email" class="input input--border fullWidth @error('email') input--error @enderror" name="email" placeholder="Your email address" value="{{ old('email') }}" required autocomplete="email" autofocus />
    @error('email')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    <label for="password">Password</label>
    <input id="password" type="password" class="input input--border fullWidth @error('password') input--error @enderror" name="password" placeholder="Your password" required autocomplete="current-password" />
    @error('password')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    <button type="submit" class="button button--round button--dark fullWidth">Sign in</button>
    <div>
        @if (Route::has('password.request'))
        <a class="button button--link  button--dark fullWidth" href="{{ route('password.request') }}">
            {{ __("Forgot Password?") }}
        </a>
        @endif
    </div>
</form>
@endsection