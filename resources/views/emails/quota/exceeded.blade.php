{{-- @component('emails::message') --}}
# Quota Exeeded

Hello {{ $user->name }},

This is just to let you knw that you've reached the quote of {{ $user->quota_threshold }} % placed on your account.

Kindly click the `Renew Button` below to renew:

{{-- @component('emails::button', ['url' => route('billing', ['threshold' => true])]) --}}

{{-- @endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
{{-- @endcomponent --}}
