@extends('layouts.auth.login')

@section('content')
<form class="login__form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <a class="button button--link button--dark" href="/">&larr; Home</a>

    <h1>{{ __('Reset Password') }}</h1>
    <input type="hidden" name="token" value="{{ $token }}">

    @error('email')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    <div style="display: none;">
        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="input input--border fullWidth @error('email') input--error @enderror" value="{{ $email ?? old('email') }}" name="email" required />
    </div>

    <label for="password">{{ __('Password') }}</label>
    <input id="password" type="password" class="input input--border fullWidth @error('password') input--error @enderror" name="password" placeholder="New password" required autocomplete="new-password" />
    @error('password')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="input input--border fullWidth @error('password') input--error @enderror" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password" />
    @error('password-confirm')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    <button type="submit" class="button button--round button--dark fullWidth">
        {{ __('Reset Password') }}
    </button>
</form>
@endsection