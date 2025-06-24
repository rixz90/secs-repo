<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use DateTime;
use Kint\Kint;

class UserController
{
    public function create(): View
    {
        $name = 'John Smith21!';
        $email = 'example2223232@com';

        $user = (new \App\Entities\User())
            ->setName($name)
            ->setEmail($email)
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt()
            ->setDeletedAt()
            ->setIsAdmin(false);
        Kint::dump($user);

        return View::make('index', ['hello' => 'Hello World Create!']);
    }
}
