<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;

class HomeController
{
    public function index(): View
    {
        $db = App::db();

        $db->query('SELECT * FROM users');

        return View::make('index');
    }
}
