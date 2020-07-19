<?php

/**
 * Dumping ground slack channel for non-prduction environment.
 */
$dumpingGround = 'slack-test-dump';

/**
 * Check if the current environment is production.
 */
$isProduction = env('APP_ENV') == 'production';

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
        'default' => $isProduction ? 'general' : $dumpingGround,
        'horizon' => $isProduction ? 'alerts' : $dumpingGround,
        'cron' => $isProduction ? 'cron-jobs' : $dumpingGround,
        'usage' => $isProduction ? 'usage' : $dumpingGround,
        'payments' => $isProduction ? 'payments' : $dumpingGround,
    ]
];
