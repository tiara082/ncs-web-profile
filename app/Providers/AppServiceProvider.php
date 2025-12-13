<?php

namespace App\Providers;

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
        // Register View Composer for footer links
        view()->composer('partials.footer', \App\View\Composers\FooterComposer::class);
        
        // Set default pagination view
        \Illuminate\Pagination\Paginator::defaultView('custom.pagination');
    }
}
