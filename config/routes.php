<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
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
    });
    $app->get('/admin', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'admin.html.twig');
    });
    $app->get('/login', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'admin.html.twig');
    });
    $app->get('/report', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'report.html.twig');
    });

    $app->get("/users", [\App\Controllers\UserController::class, 'index']);
    $app->get("/users/{id}", [\App\Controllers\UserController::class, 'show']);
    $app->post("/users", [\App\Controllers\UserController::class, 'create']);
    $app->post("/users/admin", [\App\Controllers\UserController::class, 'createAdmin']);
    $app->get("/users/edit/{id}", [\App\Controllers\UserController::class, 'edit']);
    $app->put("/users/{id}", [\App\Controllers\UserController::class, 'update']);
    $app->delete("/users/{id}", [\App\Controllers\UserController::class, 'delete']);
};
//     ->controller("/locations", LocationController::class)
//     ->controller("/branches", BranchController::class)
//     ->controller("/categories", CategoryController::class)
//     ->controller("/complaints", ComplaintController::class);