<?php

namespace App\Component\Router;

use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\Dispatcher\GroupCountBased as Dispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use Psr\Http\Message\RequestInterface;

class Router implements RouterInterface
{
    /**
     * @var RouteCollector
     */
    protected $routeCollector;

    /**
     * @var Dispatcher
     */
    protected static $dispatcher;

    public function __construct()
    {
        $this->routeCollector = new RouteCollector(new Std(), new GroupCountBased());
    }

    public function getDispatcher(): Dispatcher
    {
        if (! static::$dispatcher) {
            static::$dispatcher = new Dispatcher($this->routeCollector->getData());
        }

        return static::$dispatcher;
    }

    public function get($path, $handler)
    {
        $this->routeCollector->get($path, $handler);
    }

    public function dispatchRequest(RequestInterface $request)
    {
        $method = $request->getMethod();
        $uri = $request->getUri();

        return $this->dispatch($method, $uri);
    }

    public function dispatch($method, $uri): callable
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $routeInfo = $this->getDispatcher()->dispatch($method, $path);

        switch($routeInfo) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // Throw new Exception
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Throw new Exception
                break;
            default:
                break;
        }

        return $routeInfo[1];
    }
}
