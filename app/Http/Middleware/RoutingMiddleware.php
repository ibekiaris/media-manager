<?php

namespace App\Http\Middleware;

use App\Component\Middleware\Pipeline;
use App\Component\Router\RouterInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RoutingMiddleware
{
    /**
     * @var RouterInterface
     */
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $delegate = null)
    {
        $pipeline = new Pipeline();
        // TODO: Implement routes middlewares
        return $pipeline->pipe($this->router->dispatchRequest($request))->next($request, $response);
    }
}
