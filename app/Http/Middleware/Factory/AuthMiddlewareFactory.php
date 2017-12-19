<?php

namespace App\Http\Middleware\Factory;

use App\Http\Middleware\AuthMiddleware;
use Psr\Container\ContainerInterface;

class AuthMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthMiddleware();
    }
}
