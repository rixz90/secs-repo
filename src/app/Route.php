<?php

namespace App;

use Phroute\Phroute\RouteCollector;

class Route
{
    private RouteCollector $router;

    public function __construct()
    {
        $this->router = new RouteCollector();
    }

    public function getRouter(): RouteCollector
    {
        return $this->router;
    }

    /**
     * Dynamically call methods on the underlying RouteCollector instance.
     * This allows for a more fluent interface
     * and makes it easier to use the router without needing to
     * explicitly access the RouteCollector instance.
     * Proxy methods are used to forward calls
     */
    public function __call(string $name, array $arg): mixed
    {
        return call_user_func_array([$this->router, $name], $arg);
    }
}
