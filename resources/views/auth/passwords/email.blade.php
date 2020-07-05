@extends('layouts.auth.login')

@section('content')
<form class="login__form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <a class="button button--link button--dark" href="/">&larr; Back</a>

    <h1>Reset Password</h1>

    <label for="email">Email</label>
    <input id="email" type="email" class="input input--border fullWidth @error('email') input--error @enderror" name="email" placeholder="Your email address" value="{{ old('email') }}" required autocomplete="email" autofocus />
    @error('email')
    <span class="input__error-message" role="alert">
        {{ $message }}
    </span>
    @enderror

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <br><br>
    <button type="submit" class="button button--round button--dark fullWidth">
        {{ __('Reset') }}
    </button>
</form>
@endsection