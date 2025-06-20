<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);

use Phroute\Phroute\RouteCollector;
use App\Controllers\HomeController;
use App\View;

$router  = new RouteCollector();
$router
    ->get("/", fn() => View::make('index'))
    ->get("/index", [HomeController::class, 'index'])
    ->get("/semakan",  fn() => View::make('semakan'))
    ->get("/aduan",  fn() => View::make('aduan'))
    ->get("/login",  fn() => View::make('login'));
