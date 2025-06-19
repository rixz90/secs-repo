<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);
    require_once AUTOLOAD_PATH;
    
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $router  = new RouteCollector();

    $router
        ->get("/", [App\Controllers\HomeController::Class, 'index'] )
        ->get("/index", [App\Controllers\HomeController::Class, 'index'] )
        ->get("/semakan",  fn() => include VIEW_PATH.'/semakan.php')
        ->get("/aduan",  fn() => include VIEW_PATH.'/aduan.php')
        ->get("/login",  fn() => include VIEW_PATH.'/login.php');
    
    $dispatcher = new Dispatcher($router->getData());

    try{
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $path);
        echo $response;
        
    } catch (HttpRouteNotFoundException){
        // Handle 404 Not Found
        http_response_code(404);
        include COMPONENTS_PATH . '/404_page.php';
    } catch (Exception $e) {
        // Handle other exceptions
        http_response_code(500);
        echo 'An error occurred: ' . $e->getMessage();
    }