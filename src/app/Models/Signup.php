<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use App\Model;
use Exception;

class Signup extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register(array $request): int|null
    {
        if (!isset($request)) {
            throw new Exception("Post error");
        }
        var_dump($request);
        $name = $request['name'];
        $email = $request['email'];
        $isAdmin = (bool)$request['is_admin'];

        $id = (new User())->create($name, $email, $isAdmin);

        return $id;
    }
}
