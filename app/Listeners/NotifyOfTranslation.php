<?php

namespace App\Listeners;

use App\Contracts\Slack;
use App\Contracts\Enums\UsageType;
use App\Events\TranslationPerfomed;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class NotifyOfTranslation implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TranslationPerfomed  $event
     * @return void
     */
    public function handle($event)
    {
        $this->notifySlack($event);
    }

    /**
     * Send a notification to Slack.
     *
     * @param TranslationPerfomed $event
     * @return void
     */
    private function notifySlack(TranslationPerfomed $event)
    {
        $jsonPayload = json_encode($event->payload);
        $quotaUsed = UsageType::getQuotaAmount($event->usageType);

        $title = ":zap: Translation performed by {$event->user->email}";

        $message = "Type: `{$event->usageType->key}`\nQuota used: `{$quotaUsed}`\nPayload: ```{$jsonPayload}```";

        Slack::sendMessage($title, $message, Config::get('slack.channels.usage'));
    }
}
