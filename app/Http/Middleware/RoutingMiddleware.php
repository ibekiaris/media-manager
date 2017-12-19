<?php

namespace App\Http\Middleware;

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
        // TODO: Return new pipeline for route
        return $this->router->dispatchRequest($request)($request);
    }
}
