@extends('layouts.auth')

@section('content')
<form class="login__form" method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <a class="button button--link button--dark" href="/">&larr; Back</a>

    <h1>{{ __('Please confirm your password before continuing.') }}</h1>

    <div>
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="input input--border fullWidth @error('password') input--error @enderror" name="password" placeholder="New password" required autocomplete="current-password" />
        @error('password')
        <span class="input__error-message" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <button type="submit" class="button button--round button--dark fullWidth">
        {{ __('Confirm Password') }}
    </button>

    <div>
        @if (Route::has('password.request'))
        <a class="button button--link  button--dark fullWidth" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</form>
@endsection