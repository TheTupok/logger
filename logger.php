<?php

namespace Logger;

use \Psr\Log\AbstractLogger;
use \Psr\Log\LoggerInterface;
use SplObjectStorage;

class Logger extends AbstractLogger implements LoggerInterface
{
    public static $routes = [];
    
    public function __construct()
    {

    }

    public function addRoute(string $name, Route $route)
    {
        $this->routes[$name] = $route;

        return $this;
    }

    public function removeRoute(string $name): Logger
    {
        if ($this->routes[$name]) {
            unset($this->routes[$name]);
        }

        return $this;
    }

    public function log($level, $message, array $context = [])
    {
        foreach ($this->routes as $route) {
            if (!$route instanceof Route) {
                continue;
            }

            $route->log($level, $message, $context);
        }
    }
}