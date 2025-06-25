<?php

declare(strict_types=1);

namespace App\Controllers;

use Exception;

class UserController
{
    public function anyIndex()
    {
        return 'This is the default page and will respond to /controller and /controller/index';
    }

    /**
     * One required paramter and one optional parameter
     */
    public function anyUser(string $param, $param2 = 'default')
    {
        return "This will respond to /controller/test/$param/$param2? with any method";
    }

    public function getUser()
    {
        return 'This will respond to /controller/test with only a GET method';
    }

    public function postUser()
    {
        $userId = (new \App\Models\Signup())->register($_POST);
        if ($userId) {
            return "created user id : $userId";
        }

        throw new Exception("Failed to create users");
    }

    public function putUser()
    {
        return 'This will respond to /controller/test with only a PUT method';
    }

    public function deleteUser()
    {
        return 'This will respond to /controller/test with only a DELETE method';
    }
}
