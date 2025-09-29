<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// In AppServiceProvider.php (or another service provider)
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        //
        /*
        DB::listen(function ($query) {
        Log::info('Database Query', [
            'SQL' => $query->sql,
            'Bindings' => $query->bindings,
            'Time' => $query->time . 'ms'
        ]);
        });
        */
    }
}
