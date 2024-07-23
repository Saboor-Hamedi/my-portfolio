<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        // Paginator::useTailwind();
        // Paginator::defaultView('resources\views\vendor\pagination\default');
        Paginator::defaultView('pagination::default');

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
    public function configureMiddlewareGroups($middlewareGroups)
    {
        $middlewareGroups['admin.auth'] = \App\Http\Middleware\CheckAdminAuth::class;

        return $middlewareGroups;
    }
}
