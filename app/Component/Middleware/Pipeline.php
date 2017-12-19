<?php

namespace App\Component\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Pipeline implements PipelineInterface
{
    /**
     * @var \SplQueue
     */
    protected $pipeline;

    public function __construct()
    {
        $this->pipeline = new \SplQueue();
    }

    public function pipe($middleware): self
    {
        $this->pipeline->enqueue($middleware);
        return $this;
    }

    public function next(RequestInterface $request, ResponseInterface $response = null)
    {
        if (! $this->pipeline->count()) {
            return $response;
        }

        $middleware = $this->pipeline->dequeue();

        return $middleware($request, $response, function(RequestInterface $request, ResponseInterface $response) {
            return $this->next($request, $response);
        });
    }
}
