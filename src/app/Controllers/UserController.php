<?php

declare(strict_types=1);

namespace App\Controllers;



class UserController
{
    public function anyIndex() {}

    public function anyUser(string $param): string
    {
        $user = (new \App\Models\User)->fetchUserById($param);
        return json_encode($user);
    }

    public function getUser(): string
    {
        $user = (new \App\Models\User)->fetchUserById();
        return json_encode($user);
    }

    public function postUser() {}

    public function putUser() {}

    public function deleteUser() {}
}
