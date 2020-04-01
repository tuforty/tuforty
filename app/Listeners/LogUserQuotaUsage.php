<?php

namespace App\Listeners;

use App\Events\UserQuotaReduced;
use App\Contracts\Enums\UsageType;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogUserQuotaUsage implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  QuotaReduced  $event
     * @return void
     */
    public function handle(UserQuotaReduced $event)
    {
        // Update the users quota usage logs.
        $usageType = $event->usageType;
        $quotaUsed = UsageType::getQuotaAmount($usageType);

        $event->user->usage()->create([
            'type' => $usageType->value,
            'quota_used' => $quotaUsed
        ]);
    }
}
