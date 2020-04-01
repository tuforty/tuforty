<?php

namespace App\Events;

use App\Models\User;
use App\Contracts\Enums\UsageType;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserQuotaReduced
{
    use Dispatchable, SerializesModels;

    public $user;

    public $usageType;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, UsageType $usageType)
    {
        $this->user = $user;
        $this->usageType = $usageType;
    }
}
