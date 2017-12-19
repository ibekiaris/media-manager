<?php

namespace App\Component\Router;

use Psr\Http\Message\RequestInterface;

interface RouterInterface
{
    public function dispatchRequest(RequestInterface $request);

    public function dispatch($method, $uri);

    public function get($path, $handler);
}
