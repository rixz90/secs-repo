<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use App\Model;
use DateTime;

class User extends Model
{
    public function createUser(): int
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

        $this->em->persist($user);
        $this->em->flush();

        return $user->getId();
    }

    public function fetchUserById($id = null)
    {
        $id =  $id === null ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $user = $this->em->createQueryBuilder()->select('u')
            ->from(UserEntity::class, 'u')
            ->where('u.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();

        return $user;
    }

    public function fetchAllUsers()
    {
        $user = $this->em->createQueryBuilder()->select('u')
            ->from(UserEntity::class, 'u')
            ->getQuery()
            ->getArrayResult();

        return $user;
    }

    public function updateUser() {}

    public function dropUser() {}
}
