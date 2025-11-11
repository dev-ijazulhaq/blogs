<?php

namespace App\Providers;

use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void {}
}
