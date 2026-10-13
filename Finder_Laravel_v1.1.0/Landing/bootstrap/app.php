<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
  ->withMiddleware(function (Middleware $middleware): void {
    $middleware->redirectGuestsTo('/account-signin');
    $middleware->redirectUsersTo('/');

    $middleware->web(append: [\App\Http\Middleware\SetPublicLocale::class, \App\Http\Middleware\EnsureAccountActive::class, \App\Http\Middleware\EnsureVerifiedAccount::class, \App\Http\Middleware\TrackPublicVisitors::class]);

    $middleware->alias([
        'role' => \App\Http\Middleware\EnsureUserHasRole::class,
    ]);
})
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->dontFlash(['code']);
    })->create();
