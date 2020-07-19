<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;

    public function routeNotificationForSlack()
    {
        $channel = Config::get('slack.channels.default');

        return [
            'token' => Config::get('slack.token'),
            'channel' => "#{$channel}"
        ];
    }
}
