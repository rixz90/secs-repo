<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);

use App\Controllers\BranchController;
use App\Controllers\LocationController;
use App\Controllers\CategoryController;
use App\Controllers\ComplaintController;
use App\Controllers\UserController;
use App\Models\Branch;
use Phroute\Phroute\RouteCollector;
use App\View;
use App\Route;

$router = Route::make(RouteCollector::class);
$router
    ->get("/", fn() => View::make('index'))
    ->get("/index", fn() => View::make('index'))
    ->get("/semakan",  fn() => View::make('semakan'))
    ->get("/aduan",  fn() => View::make('aduan'))
    ->get("/login",  fn() => View::make('admin'))
    ->get("/admin",  fn() => View::make('admin'))
    ->get("/report",  fn() => View::make('report', ['branches' => (new Branch)->fetchList()]))
    ->get("/setting",  fn() => View::make('setting'))

    ->controller("/users", UserController::class)
    ->controller("/locations", LocationController::class)
    ->controller("/branches", BranchController::class)
    ->controller("/categories", CategoryController::class)
    ->controller("/complaints", ComplaintController::class);
