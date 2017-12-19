<?php

return function (\App\Application $application) {
    $application->pipe(\App\Http\Middleware\AuthMiddleware::class);
    $application->pipe(\App\Http\Middleware\RoutingMiddleware::class);
};
