<?php

namespace App\Http\Middleware;

use App\Component\Middleware\Pipeline;
use App\Component\Router\RouterInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RoutingMiddleware
{
    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct($container, $router)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $delegate = null)
    {
        // TODO: Implement Routes middlewares
        $pipeline = new Pipeline();

        $callable = $this->router->dispatchRequest($request);

        if (is_string($callable)) {
            $callable = $this->container->get($callable);
        }

        return $pipeline->pipe($callable)->next($request, $response);
    }
}
