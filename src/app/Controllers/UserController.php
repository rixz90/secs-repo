<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\View;

class UserController
{
    public function anyIndex()
    {
        $response = (new User)->fetchAllAdmin();
        return json_encode($response);
    }

    public function anyUser(string $param): string
    {
        $response = (new User)->fetchUserById($param);
        return json_encode($response);
    }
    public function anyAdmin(): string
    {
        $admin = (new User)->fetchAllAdmin();
        return View::make('@tables/admin', ["admins" => $admin])->render();
    }
    public function getUser(): string
    {
        $response = (new User)->fetchUserById();
        return json_encode($response);
    }

    public function postUser(): string
    {
        $response = (new User)->createUser();
        $admins = (new User)->fetchAllAdmin();
        return View::make('@tables/admin', ["admins" => $admins, "response" => $response])->render();
    }

    public function postAdmin(): string
    {
        $response = (new User)->createAdmin();
        $admins = (new User)->fetchAllAdmin();
        return View::make('@tables/admin', ["admins" => $admins, "response" => $response])->render();
    }
    public function putUser(): string
    {
        $response =  (new User)->update();
        $admins = (new User)->fetchAllAdmin();
        return View::make('@tables/admin', ["admins" => $admins, "response" => $response])->render();
    }

    public function deleteUser(): string
    {
        $response =  (new User)->softDelete();
        $admins = (new User)->fetchAllAdmin();
        return View::make('@tables/admin', ["admins" => $admins, "response" => $response])->render();
    }

    public function anyEdit(string $id): string
    {
        $user = (new User)->fetchUserById(htmlspecialchars($id));
        if (empty($user)) {
            return json_encode(["error" => 'Id not found']);
        }
        $arr['admins'] = $user;
        $arr['method'] = "PUT";
        return view::make('@panels/adminPanel', $arr)->render();
    }
}
