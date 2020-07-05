@component('emails.templates.html.message')
# Quota Threshold Exeeded

Hello {{ ucwords($user->name) }},

We would like to let you know that you've crossed the quota 
threshold of **{{ $user->quota_threshold }}%** placed on
your account. 

Your service with us will still continue operating as normal, 
pending when your current quota is exhausted.

Would you like to purchase extra quota?

@component('emails.templates.html.button', [
    'url' => route('billing', ['threshold' => true]),
])
    💰Purchase Extra Quota
@endcomponent

Best Wishes,

**Tochukwu**,<br>
*{{ config('app.name') }}*.
@endcomponent
