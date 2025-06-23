<?php

namespace App;

class Route
{
    private static mixed $router;

    public function __construct(string $routerClass)
    {
        static::$router = new $routerClass;
    }

    public static function router(): mixed
    {
        return static::$router;
    }

    public static function make(string $routerClass): Route
    {
        return new static($routerClass);
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
        return call_user_func_array([static::$router, $name], $arg);
    }
}
