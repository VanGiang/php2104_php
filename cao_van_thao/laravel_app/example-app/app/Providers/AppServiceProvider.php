<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\MyLayoutFooter;
use App\View\Components\MyLayoutHeader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('package-my-layout-footer', MyLayoutFooter::class);

        Blade::component('package-my-layout-header', MyLayoutHeader::class);
    }
}
