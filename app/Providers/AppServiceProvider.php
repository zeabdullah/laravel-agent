<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
    public function boot(): void
    {
        // increase ORM strictness
        Model::preventLazyLoading(true); // not sure how this is useful
        Model::preventSilentlyDiscardingAttributes(true); //
    }
}
