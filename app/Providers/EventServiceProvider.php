<?php

namespace App\Providers;

use App\Events\AccountStatusEvent;
use App\Listeners\AccountStatusListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AccountStatusEvent::class => [
            AccountStatusListener::class
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
