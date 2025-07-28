<?php

declare(strict_types=1);

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Slim\Routing\RouteCollectorProxy;
use Slim\App;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'index.html.twig');
    });
    $app->get('/semakan', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'semakan.html.twig');
    });
    $app->get('/aduan', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'aduan.html.twig');
    });
    $app->get('/setting', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'setting.html.twig');
    })->add(AuthMiddleware::class);
    $app->get('/admin', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'admin.html.twig');
    })->add(AuthMiddleware::class);

    $app->get('/report', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'report.html.twig');
    })->add(AuthMiddleware::class);

    $app->get('/register', [\App\Controllers\AuthController::class, 'registerView'])->add(GuestMiddleware::class);
    $app->post('/register', [\App\Controllers\AuthController::class, 'register'])->add(GuestMiddleware::class);
    $app->get('/login', [\App\Controllers\AuthController::class, 'loginView'])->add(GuestMiddleware::class);
    $app->post('/login', [\App\Controllers\AuthController::class, 'login'])->add(GuestMiddleware::class);
    $app->post('/logout', [\App\Controllers\AuthController::class, 'logOut'])->add(AuthMiddleware::class);

    $app->group('/users', function (RouteCollectorProxy $group) {
        $group->get('/', [\App\Controllers\UserController::class, 'index']);
        $group->get('/{id}', [\App\Controllers\UserController::class, 'show']);
        $group->post('/create', [\App\Controllers\UserController::class, 'create']);
        $group->post('/admin', [\App\Controllers\UserController::class, 'createAdmin']);
        $group->get('/edit/{id}', [\App\Controllers\UserController::class, 'edit']);
        $group->put('/{id}', [\App\Controllers\UserController::class, 'update']);
        $group->delete('/{id}', [\App\Controllers\UserController::class, 'delete']);
    });
    $app->group('/locations', function (RouteCollectorProxy $group) {
        $group->get('/', [\App\Controllers\LocationController::class, 'index']);
        $group->get('/{id}', [\App\Controllers\LocationController::class, 'show']);
        $group->get('/location/list', [\App\Controllers\LocationController::class, 'list']);
        $group->post('/create', [\App\Controllers\LocationController::class, 'create']);
        $group->get('/edit/{id}', [\App\Controllers\LocationController::class, 'edit']);
        $group->put('/{id}', [\App\Controllers\LocationController::class, 'update']);
        $group->delete('/{id}', [\App\Controllers\LocationController::class, 'delete']);
    });
    $app->group('/categories', function (RouteCollectorProxy $group) {
        $group->get('/', [\App\Controllers\CategoryController::class, 'index']);
        $group->get('/{id}', [\App\Controllers\CategoryController::class, 'show']);
        $group->post('/create', [\App\Controllers\CategoryController::class, 'create']);
        $group->get('/edit/{id}', [\App\Controllers\CategoryController::class, 'edit']);
        $group->put('/{id}', [\App\Controllers\CategoryController::class, 'update']);
        $group->delete('/{id}', [\App\Controllers\CategoryController::class, 'delete']);
    });
    $app->group('/complaints', function (RouteCollectorProxy $group) {
        $group->get('/', [\App\Controllers\ComplaintController::class, 'index']);
        $group->get('/{id}', [\App\Controllers\ComplaintController::class, 'show']);
        $group->get('/locations/list', [\App\Controllers\ComplaintController::class, 'locationList']);
        $group->get('/form/{type}', [\App\Controllers\ComplaintController::class, 'form']);
        $group->get('/table/{type}', [\App\Controllers\ComplaintController::class, 'table']);
        $group->post('/create', [\App\Controllers\ComplaintController::class, 'create']);
        $group->get('/edit/{id}', [\App\Controllers\ComplaintController::class, 'edit']);
        $group->put('/{id}', [\App\Controllers\ComplaintController::class, 'update']);
        $group->delete('/{id}', [\App\Controllers\ComplaintController::class, 'delete']);
    });
    $app->group('/branches', function (RouteCollectorProxy $group) {
        $group->get('/', [\App\Controllers\BranchController::class, 'index']);
        $group->get('/{id}', [\App\Controllers\BranchController::class, 'show']);
        $group->get('/locations/list', [\App\Controllers\BranchController::class, 'locationList']);
        $group->post('/create', [\App\Controllers\BranchController::class, 'create']);
        $group->get('/edit/{id}', [\App\Controllers\BranchController::class, 'edit']);
        $group->put('/{id}', [\App\Controllers\BranchController::class, 'update']);
        $group->delete('/{id}', [\App\Controllers\BranchController::class, 'delete']);
    });
};
