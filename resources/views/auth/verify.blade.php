@extends('layouts.auth')

@section('content')
<form class="login__form" method="GET" action="{{ route('verification.resend') }}">
    @csrf

    <a class="button button--link button--dark" href="/">
        &larr; Back
    </a>

    <h1>{{ __('Verify Your Email Address') }}</h1>

    <div>

        <p>
            Before proceeding, please check your email for a verification link.
            <br><br>
            If you did not receive the email, click the button below.
        </p>
    </div>

    <br>
    <button type="submit" class="button button--round button--dark fullWidth">
        {{ __('Resend Verification') }}
    </button>

    @if (session('resent'))
    <br>
    <span class="input__info-message text-center" role="alert">
        {{ __('Verification link sent successfully.') }}
    </span>
    @endif
</form>
@endsection