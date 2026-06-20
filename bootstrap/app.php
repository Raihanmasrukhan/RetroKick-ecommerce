<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

if (isset($_ENV['VERCEL_URL']) || isset($_SERVER['VERCEL_URL'])) {
    $app->useStoragePath('/tmp/storage');
    $storage = '/tmp/storage';
    $dirs = ['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs'];
    foreach ($dirs as $dir) {
        if (!is_dir($storage . $dir)) {
            @mkdir($storage . $dir, 0755, true);
        }
    }
}

return $app;
