<?php

namespace App\Providers;

use App\Models\BussinessSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        if (!app()->runningInConsole()) {
            if (Schema::hasTable('bussiness_settings')) {
                $settings = BussinessSettings::first();
                View::share('settings', $settings);
            }
        }
    }
}
