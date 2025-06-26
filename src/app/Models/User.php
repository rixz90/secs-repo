<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use App\Model;
use App\App;
use DateTime;

class User extends Model
{
    public function create(): int
    {
        $name = htmlspecialchars($_GET['name'], ENT_QUOTES);
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
        $isAdmin = filter_var($_GET['is_admin'], FILTER_VALIDATE_BOOLEAN);
        $isStudent = filter_var($_GET['is_student'], FILTER_VALIDATE_BOOLEAN);
        $isStaff = filter_var($_GET['is_staff'], FILTER_VALIDATE_BOOLEAN);

        $user = (new UserEntity())
            ->setName($name)
            ->setEmail($email)
            ->setCreatedAt(new DateTime())
            ->setIsAdmin($isAdmin)
            ->setIsStudent($isStudent)
            ->setIsStaff($isStaff);

        $entManager = App::entityManager();
        $entManager->persist($user);
        $entManager->flush();

        return $user->getId();
    }

    public function drop() {}
}
