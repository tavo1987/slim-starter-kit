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

    public function addRoute($uri , $handler, $methods = ['GET'])
    {
        if ($this->hasParameters($uri)) {
            $parseRequestUri = parseUrl($_SERVER['REQUEST_URI']);
            $parseRegisterUri = parseUrl($uri);

            // Checking if parameters exists on request uri
            if (count($parseRequestUri) > 1) {
                //Update registered route
                $uri = "/{$parseRegisterUri[0]}/{$parseRequestUri[1]}";

                //Save params
                if (is_array($handler))  {
                    $handler[] = $parseRequestUri[1];
                }
            }
        }

        $this->routes[$uri]  = $handler;
        $this->methods[$uri] = $methods;
    }

    public function hasParameters($uri)
    {
        return strpos($uri, '{') !== false || strpos($uri, '}') !== false;
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
