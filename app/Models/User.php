<?php

namespace App\Models;

use Exception;
use Laravel\Cashier\Billable;
use App\Events\UserQuotaReduced;
use App\Contracts\Enums\UsageType;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Log;
use App\Contracts\Enums\PricingPlan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Exceptions\UserQuotaNotCreditedException;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Billable, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the quota usage for a user.
     *
     * @return \App\Models\Usage
     */
    public function usage()
    {
        return $this->hasMany(Usage::class);
    }

    /**
     * Get the transaction history for a user.
     *
     * @return \App\Models\Usage
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Check if a user still has quota remaining.
     *
     * @return boolean
     */
    public function hasQuotaLeft()
    {
        return $this->quota_left > 0;
    }

    /**
     * Decrement the quota for by unit of usage type specified.
     *
     * @param integer $amount
     * @return boolean
     */
    public function decrementQuota(UsageType $usageType): bool
    {
        $this->quota_left -= UsageType::getQuotaAmount($usageType);
        if (!$this->hasQuotaLeft()) $this->quota_left = 0;

        return tap($this->save(), function ($result) use ($usageType) {
            if ($result) event(new UserQuotaReduced($this, $usageType));
        });
    }

    /**
     * Increment the quote for a user.
     *
     * @param integer $amount
     * @return boolean
     */
    public function incrementQuota(int $amount = 1): bool
    {
        $this->quota_left += $amount;
        if (!$this->hasQuotaLeft()) $this->quota_left = 0;

        return $this->save();
    }

    /**
     * Credit user with quota purchased.
     *
     * @param PricingPlan $plan
     * @return boolean
     */
    public function creditWithQuota($quantity = 0)
    {
        $this->incrementQuota($quantity);
        $this->quota_last_purchased = $quantity; // TODO : Think throught what this shoule be.

        if (!$this->save()) throw new UserQuotaNotCreditedException();
    }

    /**
     * Generate invoice for a user specified.
     *
     * @param PricingPlan $plan
     * @return void
     */
    public function invoiceAndCharge(PricingPlan $plan)
    {
        try {
            $selectedPlan = $plan->value;
            $description = "Payment for Tuforty Credits";
            $options = ['metadata' => ['source' => 'tuforty']];
            $this->invoiceFor($description, $selectedPlan['price'], [], $options);
        } catch (Exception $e) {
            // Do nothing, as invoice will keep retrying till sent.
        }
    }

    /**
     * Handle charging a card for a user.
     *
     * @param PricingPlan $plan
     * @param string $paymentRef
     * @param boolean $saveCard
     * @return Object
     */
    public function chargeWithStripe(PricingPlan $plan, string $paymentRef, bool $saveCard = false)
    {
        // Update default payment method
        // $this->updateDefaultPaymentMethod($paymentRef);

        // Charge Card
        return $this->charge($plan->value['price'], $paymentRef);

        // // Generate Invoice
        // $this->invoiceAndCharge($plan);

        // Handle Card Details
        // $this->updateDefaultPaymentMethodFromStripe();
        // if (!$saveCard) $this->defaultPaymentMethod()->delete();
    }
}
