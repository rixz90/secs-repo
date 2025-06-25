<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);

use App\View;
use App\Route;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector;

$router = Route::make(RouteCollector::class);
$router
    ->get("/", fn() => View::make('index'))
    ->get("/index", fn() => View::make('index'))
    ->get("/semakan",  fn() => View::make('semakan'))
    ->get("/aduan",  fn() => View::make('aduan'))
    ->get("/login",  fn() => View::make('admin'))
    ->get("/admin",  fn() => View::make('admin'))
    ->get("/report",  fn() => View::make('report'))
    ->get("/setting",  fn() => View::make('setting'))

    ->controller("/users", UserController::class);
