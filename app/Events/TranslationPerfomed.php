<?php

namespace App\Events;

use App\Models\User;
use App\Contracts\Enums\UsageType;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class TranslationPerfomed
{
    use Dispatchable, SerializesModels;

    /**
     * User that performed the translation.
     *
     * @var User
     */
    public $user;

    /**
     * Trnalsation usage type
     *
     * @var UsageType
     */
    public $usageType;

    /**
     * Translation payload
     *
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, UsageType $usageType, array $payload)
    {
        $this->user = $user;
        $this->payload = $payload;
        $this->usageType = $usageType;
    }
}
