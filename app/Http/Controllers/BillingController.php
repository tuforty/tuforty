<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Contracts\Enums\PricingPlan;
use App\Events\PaymentSuccessful;
use App\Http\Requests\Billing\MakePaymentRequest;
use Laravel\Cashier\Exceptions\IncompletePayment;

class BillingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:passport');
    }

    /**
     * Get the current plan for a user.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function currentPlan(Request $request)
    {
        $user = $request->user();
        $transaction = $user->transactions()->orderBy('updated_at', 'DESC')->first();

        $payload = [
            'quota_left' => $user->quota_left,
            'quota_last_purchased' => $user->quota_last_purchased,
            'last_transaction' => $transaction
        ];

        return response()->ok('Plan fetched successfully.', $payload);
    }

    /**
     * Make a purchase for quota.
     *
     * @param MakePaymentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function purchaseQuota(MakePaymentRequest $request)
    {
        $pricingPlan = PricingPlan::coerce($request->get('product_id'));

        return $this->_handlePurchaseQuota(
            $request->user(),
            $pricingPlan,
            $request->get('stripe_payment_intent'),
            $request->get('save_card')
        );
    }

    /**
     * Handle the main purchase of quota.
     *
     * @param User $user
     * @param PricingPlan $pricingPlan
     * @param string $stripeRef
     * @param boolean $saveCard
     * @return \Illuminate\Http\Response
     */
    private function _handlePurchaseQuota(
        User $user,
        PricingPlan $pricingPlan,
        string $stripeRef,
        bool $saveCard
    ) {
        DB::beginTransaction();
        $transaction = [
            'plan_name' => $pricingPlan->key,
            'plan_amount' => $pricingPlan->value['price'],
            'quota_purchased' => $pricingPlan->value['quota']
        ];

        try {
            $charge = $user->chargeWithStripe($pricingPlan, $stripeRef, $saveCard);
            $user->creditWithQuota($pricingPlan->value['quota']);
            $user->transactions()->create($transaction);
            event(new PaymentSuccessful($user, (int) $pricingPlan->value['price'], $transaction));
        } catch (IncompletePayment $ex) {
            Log::error($ex->getMessage(), [$user, $charge]);
            return response()->badRequest($ex->getMessage());
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), [$user, $charge]);
            $user->refund($charge->id);
            return response()->internalServerError($ex->getMessage());
        }


        DB::commit();
        $payload = ['current_quota' => $user->quota_left];
        return response()->ok('Payment successfull.', $payload);
    }
}
