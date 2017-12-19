<?php

namespace App\Component\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface PipelineInterface
{
    public function pipe($middleware);

    public function next(RequestInterface $request, ResponseInterface $response = null);
}
