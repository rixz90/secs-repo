<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use App\Model;
use App\App;
use DateTime;

class User extends Model
{
    public function create(string $name, string $email, bool $is_admin): int
    {
        $user = (new UserEntity())
            ->setName($name)
            ->setEmail($email)
            ->setCreatedAt(new DateTime())
            ->setIsAdmin($is_admin);

        $entManager = App::entityManager();
        $entManager->persist($user);
        $entManager->flush();

        return $user->getId();
    }

    public function drop() {}
}
