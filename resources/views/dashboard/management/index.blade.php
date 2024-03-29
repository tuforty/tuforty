@extends('layouts.app')

@section('content')
<div id="billing">
  <billing-status></billing-status>
  <billing-payments
      :payment-methods="{{ json_encode($paymentMethods) }}"
      intent-secret="{{ $intent->client_secret }}"
  />
</div>
@endsection
