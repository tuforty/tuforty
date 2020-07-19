<?php

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Config;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        $slackWebhookUrl = env('SLACK_WEBHOOK_URL', '');
        $slackChannel = Config::get('slack.channels.horizon');

        Horizon::routeSlackNotificationsTo($slackWebhookUrl, "#{$slackChannel}")
            ->routeMailNotificationsTo('nkemdilimtochukwu@gmail.com')
            ->night();
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewHorizon', function ($user) {
            return in_array(strtolower($user->email), [
                'nkemdilimtochukwu@gmail.com'
            ]);
        });
    }
}
