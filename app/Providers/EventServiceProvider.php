<?php

namespace App\Providers;

use App\Events\AccountStatusEvent;
use App\Events\BlogPublishEvent;
use App\Listeners\AccountStatusListener;
use App\Listeners\BlogPublishListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AccountStatusEvent::class => [
            AccountStatusListener::class
        ],
        BlogPublishEvent::class => [
            BlogPublishListener::class
        ],
    ];
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
