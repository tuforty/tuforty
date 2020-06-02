@extends('layouts.app')

@section('content')
<div id="managment">
  <section>
    <billing-status></billing-status>
    <manage-api-tokens></manage-api-tokens>
  </section>
  <billing-payments
      :payment-methods="{{ json_encode($paymentMethods) }}"
      intent-secret="{{ $intent->client_secret }}"
  />
</div>
@endsection
