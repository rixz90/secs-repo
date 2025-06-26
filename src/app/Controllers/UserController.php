<?php

declare(strict_types=1);

namespace App\Controllers;



class UserController
{
    public function anyIndex()
    {
        return 'This is the default page and will respond to /controller and /controller/index';
    }

    /**
     * One required paramter and one optional parameter
     */
    public function anyUser(string $param) {}

    public function getUser()
    {
        $res = (new \App\Models\User)->create();
        if ($res) {
            return "Failed to get user";
        }

        return $res;
    }

    public function postUser() {}

    public function putUser()
    {
        return 'This will respond to /controller/test with only a PUT method';
    }

    public function deleteUser()
    {
        return 'This will respond to /controller/test with only a DELETE method';
    }
}
