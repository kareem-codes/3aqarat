<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
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
        FilamentView::registerRenderHook(
            'panels::body.start',
            fn (): string => Blade::render('<div dir="rtl" style="direction: rtl;">'),
        );
        
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn (): string => '</div>',
        );
    }
}
