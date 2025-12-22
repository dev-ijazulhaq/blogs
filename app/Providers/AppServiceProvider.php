<?php

namespace App\Providers;

use App\Events\AccountStatusEvent;
use App\Listeners\AccountStatusListener;
use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
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
        Response::macro('success', function ($data = null, $message = 'Success') {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ]);
        });


        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
        Paginator::useBootstrapFive();
    }
}
