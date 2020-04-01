<?php

namespace App\Http\Requests\Billing;

use App\Contracts\Enums\PricingPlan;
use Illuminate\Foundation\Http\FormRequest;

class MakePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $pricingPlans = implode(',', PricingPlan::getKeys());

        return [
            'save_card' => 'required|boolean',
            'stripe_payment_intent' => 'required|string',
            'product_id' => "required|string|in:{$pricingPlans}"
        ];
    }
}
