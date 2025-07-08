<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use App\Model;
use DateTime;

class User extends Model
{
    public function createUser(): UserEntity | array
    {
        // Input array
        $input = [
            'studentId' => isset($_POST['studentId']) ? htmlspecialchars($_POST['studentId']) : null,
            'employeeId' => isset($_POST['employeeId']) ? htmlspecialchars($_POST['employeeId']) : null,
            'name' => htmlspecialchars($_POST['name']),
            'email' => $_POST['email'],
            'phone' => $_POST['phone']
        ];
        // Define filters for each key
        $filters = [
            'studentId' => FILTER_SANITIZE_SPECIAL_CHARS,
            'employeeId' => FILTER_SANITIZE_SPECIAL_CHARS,
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
            'phone' => FILTER_SANITIZE_NUMBER_INT
        ];
        $var = filter_var_array($input, $filters);
        try {
            if (empty($var['name']) || empty($var['email'])) {
                return ['error' => 'name or email empty'];
            }
            $user = new UserEntity();
            $user->setName($var['name'])
                ->setEmail($var['email'])
                ->setCreatedAt(new DateTime())
                ->setStudentId(empty($var['studentId']) ? null : $var['studentId'])
                ->setEmployeeId(empty($var['employeeId']) ? null : $var['employeeId'])
                ->setPhone($var['phone']);

            $this->em->persist($user);
            $this->em->flush();
            return $user;
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
        $user = $this->em->createQueryBuilder()
            ->select('u')
            ->from(UserEntity::class, 'u')
            ->getQuery()
            ->getArrayResult();
        return $user;
    }
    public function fetchAllAdmin(): array
    {
        $user = $this->em->createQueryBuilder()
            ->select('u')
            ->from(UserEntity::class, 'u')
            ->where('u.isAdmin = 1')
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

            /** @var UserEntity $user */
            $user = $this->em->find(UserEntity::class, $id);
            $name != $user->getName() ? $user->setName($name) : '';
            $isAdmin != $user->isAdmin() ? $user->setIsAdmin($isAdmin) : '';
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
