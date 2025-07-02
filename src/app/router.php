<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);

use App\Controllers\BranchController;
use App\Controllers\LocationController;
use App\Controllers\CategoryController;
use App\Controllers\ComplaintController;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector;
use App\View;
use App\Route;

$router = Route::make(RouteCollector::class);
$router
    ->get("/", fn() => View::make('index'))
    ->get("/index", fn() => View::make('index'))
    ->get("/review",  fn() => View::make('semakan'))
    ->get("/create",  fn() => View::make('aduan'))
    ->get("/login",  fn() => View::make('admin'))
    ->get("/admin",  fn() => View::make('admin'))
    ->get("/report",  fn() => View::make('report'))
    ->get("/setting",  fn() => View::make('setting'))

    ->controller("/users", UserController::class)
    ->controller("/locations", LocationController::class)
    ->controller("/branches", BranchController::class)
    ->controller("/categories", CategoryController::class)
    ->controller("/complaints", ComplaintController::class);
