<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('dashboard', function ($view) {
            $view->with('users', User::whereStatus(true)->whereRole('User')->get());
            $view->with('inactiveusers', User::whereStatus(false)->whereRole('User')->get());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
