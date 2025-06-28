<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use App\Model;
use DateTime;

class User extends Model
{
    public function createUser(): bool | array
    {
        // Input array
        $input = [
            'name' => htmlspecialchars($_POST['name']),
            'is_admin' => $_POST['is_admin'],
            'is_student' => $_POST['is_student'],
            'is_staff' => $_POST['is_staff'],
            'email' => $_POST['email']
        ];
        // Define filters for each key
        $filters = [
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'is_admin' => FILTER_VALIDATE_BOOLEAN,
            'is_student' => FILTER_VALIDATE_BOOLEAN,
            'is_staff' => FILTER_VALIDATE_BOOLEAN,
            'email' => FILTER_VALIDATE_EMAIL
        ];
        $var = filter_var_array($input, $filters);
        try {
            $name = $var['name'];
            $isAdmin = $var['is_admin'];
            $isStudent = $var['is_student'];
            $isStaff = $var['is_staff'];
            $email = $var['email'];
            if (empty($name) || empty($email)) {
                return false;
            }
            if (!$name && !$email) {
                return false;
            }
            $user = new UserEntity();
            $user->setName($name)
                ->setEmail($email)
                ->setCreatedAt(new DateTime())
                ->setUpdatedAt(new DateTime())
                ->setIsAdmin($isAdmin)
                ->setIsStudent($isStudent)
                ->setIsStaff($isStaff);
            $this->em->persist($user);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchUserById($param = null): array
    {
        $id =  $param === null ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)
            : filter_var($param, FILTER_SANITIZE_NUMBER_INT);
        if (!$id) {
            return [];
        }

        $user = $this->em->createQueryBuilder()->select('u')
            ->from(UserEntity::class, 'u')
            ->where('u.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
        return $user;
    }

    public function fetchAllUsers(): array
    {
        $user = $this->em->createQueryBuilder()->select('u')
            ->from(UserEntity::class, 'u')
            ->getQuery()
            ->getArrayResult();
        return $user;
    }

    public function updateUser(): bool | array
    {
        try {

            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return false;
            }
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);
            $isAdmin = filter_var($_GET['is_admin'], FILTER_VALIDATE_BOOLEAN);
            $isStudent = filter_var($_GET['is_student'], FILTER_VALIDATE_BOOLEAN);
            $isStaff = filter_var($_GET['is_staff'], FILTER_VALIDATE_BOOLEAN);

            /** @var UserEntity $user */
            $user = $this->em->find(UserEntity::class, $id);
            $name != $user->getName() ? $user->setName($name) : '';
            $isAdmin != $user->isAdmin() ? $user->setIsAdmin($isAdmin) : '';
            $isStudent != $user->isStudent() ? $user->setIsStudent($isStudent) : '';
            $isStaff != $user->isStaff() ? $user->setIsStaff($isStaff) : '';
            $user->setUpdatedAt(new DateTime());
            $this->em->persist($user);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['err' => $e->getMessage()];
        }
    }

    public function softDeleteUser(): bool
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return false;
        }
        /** @var UserEntity $user */
        $user = $this->em->find(UserEntity::class, $id);
        if ($user === null) {
            return false;
        }
        $user->setDeletedAt(new DateTime());
        $this->em->persist($user);
        $this->em->flush();
        return true;
    }

    public function hardDeleteUser(): array
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input'];
        }
        /** @var UserEntity $user */
        $user = $this->em->find(UserEntity::class, $id);
        if ($user === null) {
            return ['error' => 'user not found'];
        }
        $user->setDeletedAt(new DateTime());
        $this->em->remove($user);
        $this->em->flush();
        return ['id' => $user->getId()];
    }
}
