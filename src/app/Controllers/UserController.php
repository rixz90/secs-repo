<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\View;

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
    public function anyAdmin(): string
    {
        $response = (new User)->fetchAllAdmin();
        return (string) \App\View::make('@tables/admin', ["users" => $response]);
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
        $response =  (new User)->softDeleteUser();
        return json_encode($response);
    }
    public function getForm(): string
    {
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (isset($params['method']) == 'update' && isset($params['id'])) {
            $admin = (new User)->fetchUserById($params['id']);
            if (empty($admin)) {
                return json_encode(["error" => 'Id not found']);
            }
            $arr['admin'] = $admin;
            $arr['method'] = "PUT";
            return View::make('@panels/adminPanel', $arr)->render();
        }
        return json_encode(["error" => 'Form not found']);
    }
}
