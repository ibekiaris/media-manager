<?php

namespace App\Component\Router;

use Psr\Http\Message\RequestInterface;

interface RouterInterface
{
    public function dispatchRequest(RequestInterface $request);

    public function dispatch(string $method, string $uri);

    public function get(string $path, $handler);
}
