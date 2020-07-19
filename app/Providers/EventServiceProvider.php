<?php

namespace App\Providers;

use App\Events\TranslationPerfomed;
use App\Listeners\LogUserQuotaUsage;
use App\Listeners\NotifyOfTranslation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TranslationPerfomed::class => [
            LogUserQuotaUsage::class,
            NotifyOfTranslation::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
