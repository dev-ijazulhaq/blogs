<?php

namespace App\Providers;

use App\Events\AccountStatusEvent;
use App\Listeners\AccountStatusListener;
use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Blog::class => BlogPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
        Paginator::useBootstrapFive();
    }
}
