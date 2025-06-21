<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;
use App\App;
use App\Models\Signup;

class UserController
{
    public function create(): View
    {
        $name = 'John Smith21!';
        $email = 'example2223232@com';

        $user = new User();
        $id = (new Signup($user))->register($name, $email);

        return View::make('index', ['hello' => 'Hello World Create!', 'id' => (string) $id]);
    }
}
