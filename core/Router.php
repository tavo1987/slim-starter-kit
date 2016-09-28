<?php

namespace Core;

use Core\Exceptions\MethodNotAllowedException;
use Core\Exceptions\RouteNotFoundException;

class Router
{

    protected $path;

    protected $routes = [];

    protected $methods = [];

    public function setPath($path = '/')
    {
        $this->path = $path;
    }

    public function addRoute($uri, $handler, $methods = ['GET'])
    {
        $this->routes[$uri]      = $handler;
        $this->methods[$uri]     = $methods;
    }

    public function getResponse()
    {
        if (!isset($this->routes[$this->path])) {
            throw new RouteNotFoundException('No route registered for ' . $this->path);
        }

        if (!in_array($_SERVER['REQUEST_METHOD'], $this->methods[$this->path])) {
            throw new MethodNotAllowedException;
        }

        return $this->routes[$this->path];
    }
}
