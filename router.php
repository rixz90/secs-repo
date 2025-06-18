<?php

declare(strict_types=1);
    require '../vendor/autoload.php';
    
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $router  = new RouteCollector();

    $router->get("/",  function () {
        include '../src/views/index.php';
    });
    $router->get("/index",  function () {
        include '../src/views/index.php';
    });
    $router->get("/semakan",  function () {
        include '../src/views/semakan.php';
    });
    $router->get("/aduan",  function () {
        include '../src/views/aduan.php';
    });

    
    $dispatcher = new Dispatcher($router->getData());

    try{
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $path);
        echo $response;
        
    } catch (HttpRouteNotFoundException $e){
        echo "404 Not Found";
    }