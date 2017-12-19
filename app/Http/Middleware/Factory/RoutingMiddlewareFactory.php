<?php

namespace App\Http\Middleware\Factory;

use App\Component\Router\RouterInterface;
use App\Http\Middleware\RoutingMiddleware;
use Psr\Container\ContainerInterface;

class RoutingMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RoutingMiddleware($container->get(RouterInterface::class));
    }
}
