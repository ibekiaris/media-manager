<?php

namespace App\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthMiddleware
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $delegate = null)
    {
        return $delegate($request, $response);
    }
}
