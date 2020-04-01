@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dasboard > Billing</div>

                <div class="card-body">
                    @if (Request::get('expired'))
                        <div>Your quota has been exhausted.</div>
                    @endif

                    <div>
                        This contains more infor about your Billing & quota purchase.
                    </div>
                </div>
            </div>

            <br>
            <br>
            <billing-manage-cards 
                :payment-methods="{{ json_encode($paymentMethods) }}"
                intent-secret="{{ $intent->client_secret }}"
            />
        </div>
    </div>
</div>
@endsection


@section('scripts')
{{-- <script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config("stripe.publicKey") }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {

        if (error) {
            const displayError = document.getElementById('card-errors');
            displayError.textContent = error.message;
        } else {
            console.log(setupIntent);
            console.log(JSON.stringify(setupIntent));
            alert(setupIntent);
        }
    });
</script>

<style>
    .StripeElement {
        box-sizing: border-box;
        width: 100%;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style> --}}
@endsection