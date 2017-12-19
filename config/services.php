<?php

return [
    'services' => [],
    'invokables' => [],
    'factories' => [
        \App\Component\Router\RouterInterface::class => \App\Component\Router\RouterFactory::class,
        // Middlewares
        \App\Http\Middleware\AuthMiddleware::class => \App\Http\Middleware\Factory\AuthMiddlewareFactory::class,
        \App\Http\Middleware\RoutingMiddleware::class => \App\Http\Middleware\Factory\RoutingMiddlewareFactory::class,
        // Actions
        \App\Http\Action\IndexAction::class => \App\Http\Action\Factory\IndexActionFactory::class
    ],
    'abstract_factories' => [],
    'delegators' => [],
    'shared' => [],
    'aliases' => [],
    'lazy_services' => []
];
