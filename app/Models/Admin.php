<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;

    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOK_URL');
    }
}
