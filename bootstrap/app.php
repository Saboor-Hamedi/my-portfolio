<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\CheckAdminAuth;
use App\Http\Middleware\PreventBackHistory;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register global middleware
        $middleware->use([
            PreventBackHistory::class,
        ]);

        // Register route middleware
        $middleware->alias([
            'guest' => RedirectIfAuthenticated::class,
            'auth' => CheckAdminAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
