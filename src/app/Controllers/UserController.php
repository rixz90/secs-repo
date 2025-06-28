<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function anyIndex()
    {
        $response = (new User)->fetchAllUsers();
        return json_encode($response);
    }

    public function anyUser(string $param): string
    {
        $response = (new User)->fetchUserById($param);
        return json_encode($response);
    }

    public function getUser(): string
    {
        $response = (new User)->fetchUserById();
        return json_encode($response);
    }

    public function postUser(): string
    {
        $response = (new User)->createUser();
        return json_encode($response);
    }

    public function putUser(): string
    {
        $response =  (new User)->updateUser();
        return json_encode($response);
    }

    public function deleteUser(): string
    {
        $response =  (new User)->hardDeleteUser();
        // $response =  (new User)->softDeleteUser();
        return json_encode($response);
    }
}
