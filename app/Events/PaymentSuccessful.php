<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class PaymentSuccessful
{
    use Dispatchable, SerializesModels;

    /**
     * User who made the purchase.
     *
     * @var User
     */
    public $user;

    /**
     * Amount purchased by user.
     *
     * @var int
     */
    public $amountPurchased;

    /**
     * Billing purchase payload.
     *
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, int $amountPurchased, array $payload)
    {
        $this->user = $user;
        $this->payload = $payload;
        $this->amountPurchased = $amountPurchased;
    }
}
