<?php
// Documentation: https://github.com/mrjgreen/phroute

declare(strict_types=1);

use App\View;
use App\Route;
use App\Controllers\UserController;

$router = new Route();
$router
    ->get("/", fn() => View::make('index'))
    ->get("/index", fn() => View::make('index'))
    ->get("/semakan",  fn() => View::make('semakan'))
    ->get("/aduan",  fn() => View::make('aduan'))
    ->get("/login",  fn() => View::make('login'))

    ->get("/users", [UserController::class, 'indexAll'])
    //->get("/users/{id}", [UserController::class, 'index'])
    ->get("/users/create", [UserController::class, 'create'])
    //->any("/users/{id}", [UserController::class, 'update'])
    ->delete("/users/{id}", [UserController::class, 'delete']);
