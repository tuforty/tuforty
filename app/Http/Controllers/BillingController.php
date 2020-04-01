<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Enums\PricingPlan;
use App\Exceptions\StripeChargeFailed;
use App\Http\Requests\Billing\MakePaymentRequest;

class BillingController extends Controller
{
    /**
     * Get the billing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function get(Request $request)
    {
        return view('dashboard.billing.index', [
            'intent' => $request->user()->createSetupIntent(),
            'paymentMethods' => $request->user()->paymentMethods()
        ]);
    }

    /**
     * Make a purchase for quota.
     *
     * @param MakePaymentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function purchaseQuota(MakePaymentRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $pricingPlan = PricingPlan::coerce($request->get('product_id'));

            return $this->_handlePurchaseQuota(
                $request->user(),
                $pricingPlan,
                $request->get('stripe_payment_intent'),
                $request->get('save_card')
            );
        });
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
        try {
            $charge = $user->chargeWithStripe($pricingPlan, $stripeRef, $saveCard);
            $user->creditWithQuota($pricingPlan->value['quota']);
        } catch (StripeChargeFailed $err) {
            return response()->notModified($err->getMessage());
        } catch (StripeChargeFailed $err) {
            $user->refund($charge->id);
            return response()->internalServerError('Stripe charge failed.');
        } catch (Exception $err) {
            return response()->internalServerError($err->getMessage());
        }

        return response()->ok('Payment successfull.');
    }
}
