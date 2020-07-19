<?php

namespace App\Listeners;

use App\Contracts\Enums\UsageType;
use App\Events\TranslationPerfomed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogUserQuotaUsage implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TranslationPerfomed  $event
     * @return void
     */
    public function handle(TranslationPerfomed $event)
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
