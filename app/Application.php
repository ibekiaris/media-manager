<?php

namespace App;

use App\Component\Router\RouterInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;

class Application
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RouterInterface
     */
    protected $router;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->router = $this->container->get(RouterInterface::class);
    }

    public function handle(RequestInterface $request)
    {
        
    }
}
