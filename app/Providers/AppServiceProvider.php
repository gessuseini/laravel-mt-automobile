<?php

namespace App\Providers;

use App\Models\FAQ;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Cache;

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
    public function boot()
    {
        View::composer('*', function ($view) {
            $globalSettings = Cache::remember('global_settings', 60 * 60, function () {
                return GlobalSetting::first();
            });

            $faqs = Cache::remember('public_faqs', 60 * 60, function () {
                return FAQ::all();
            });

            $view->with([
                'globalSettings' => $globalSettings,
                'faqs' => $faqs
            ]);
        });
    }
}
