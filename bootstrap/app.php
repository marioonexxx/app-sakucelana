<?php

use App\Http\Middleware\Administrator;
use App\Http\Middleware\Inventaris;
use App\Http\Middleware\Kasir;
use App\Http\Middleware\Keuangan;
use App\Http\Middleware\Manajer;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Kasir' => Kasir::class,
            'Manajer' => Manajer::class,
            'Keuangan' => Keuangan::class,
            'Inventaris' => Inventaris::class,
            'Administrator' => Administrator::class,
        ]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
