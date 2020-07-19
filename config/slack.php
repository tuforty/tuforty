<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Slack OAuth token.
    |--------------------------------------------------------------------------
    |
    */
    'token' => env('SLACK_OAUTH_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Cron Job Slack Channel
    |--------------------------------------------------------------------------
    |
    | Channel to notify for different slack notifications.
    |
    */
    'channels' => [
        'default' => 'general',
        'horizon' => 'alerts',
        'cron' => 'cron-jobs',
        'usage' => 'usage'
    ]
];
