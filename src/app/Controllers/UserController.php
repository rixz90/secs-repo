<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;

class UserController
{
    public function index(): View
    {
        $db = App::db();




        return View::make('index', ['hello' => 'Hello World!']);
    }
}
