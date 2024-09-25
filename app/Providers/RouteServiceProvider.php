<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Подключение API маршрутов
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Подключение Web маршрутов
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}

