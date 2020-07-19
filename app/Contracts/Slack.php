<?php

namespace App\Contracts;

use App\Models\Admin;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SlackTaskNotification;

class Slack
{
    /**
     * Send message to the default channel.
     *
     * @param string $title
     * @param string $message
     * @return void
     */
    public static function sendMessage(string $title, string $message, $channel = 'general')
    {
        Notification::send(
            Admin::first(),
            new SlackTaskNotification($title, $message, $channel)
        );
    }
}
