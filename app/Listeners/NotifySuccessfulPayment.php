<?php

namespace App\Listeners;

use App\Contracts\Slack;
use App\Events\PaymentSuccessful;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySuccessfulPayment implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PaymentSuccessful  $event
     * @return void
     */
    public function handle(PaymentSuccessful $event)
    {
        $this->notifySlack($event);
    }


    /**
     * Send a notification to Slack.
     *
     * @param PaymentSuccessful $event
     * @return void
     */
    private function notifySlack(PaymentSuccessful $event)
    {
        $jsonPayload = json_encode($event->payload);

        $title = ":moneybag: Payment successful by {$event->user->email}";

        $message = "Amount: `\${$event->amountPurchased}`\nMetadata: ```{$jsonPayload}```";

        Slack::sendMessage($title, $message, Config::get('slack.channels.payments'));
    }
}
