<?php

return [
    'services' => [],
    'invokables' => [],
    'factories' => [
        \App\Component\Router\RouterInterface::class => \App\Component\Router\RouterFactory::class,
        // Middlewares
        \App\Http\Middleware\AuthMiddleware::class => \App\Http\Middleware\Factory\AuthMiddlewareFactory::class,
        \App\Http\Middleware\RoutingMiddleware::class => \App\Http\Middleware\Factory\RoutingMiddlewareFactory::class,
    ],
    'abstract_factories' => [],
    'delegators' => [],
    'shared' => [],
    'aliases' => [],
    'lazy_services' => []
];
