<?php

namespace App;

use App\Component\Middleware\Pipeline;
use App\Component\Middleware\PipelineInterface;
use App\Component\Router\RouterInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;

class Application implements PipelineInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var PipelineInterface
     */
    protected $pipeline;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var array
     */
    protected $config;

    public function __construct(ContainerInterface $container)
    {
        $this->init($container);

        $this->initMiddlewares();

        $this->initRoutes();
    }

    public function next(RequestInterface $request, ResponseInterface $response = null)
    {
        if (!$response) {
            $response = new Response();
        }

        return $this->pipeline->next($request, $response);
    }

    public function pipe($middleware): self
    {
        $this->pipeline->pipe($this->container->get($middleware));
        return $this;
    }

    public function getRouter(): RouterInterface
    {
        return $this->router;
    }

    protected function init(ContainerInterface $container)
    {
        $this->container = $container;
        $this->config = $container->get('config');
        $this->pipeline = new Pipeline();
        $this->router = $container->get(RouterInterface::class);
    }

    protected function initMiddlewares()
    {
        $this->config['middlewares']($this);
        return $this;
    }

    protected function initRoutes()
    {
        $this->config['routes']($this);
        return $this;
    }
}
