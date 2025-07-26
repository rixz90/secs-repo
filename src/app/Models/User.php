<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User as UserEntity;
use DateTime;
use Doctrine\ORM\EntityManager;

class User
{
    public function __construct(protected EntityManager $em) {}

    public function createUser(array $var): void
    {
        $user = new UserEntity();
        $user
            ->setName($var['name'])
            ->setEmail($var['email'])
            ->setStudentId(!empty($var['studentId']) ?  $var['studentId'] : null)
            ->setEmployeeId(!empty($var['employeeId']) ? $var['employeeId'] : null)
            ->setPhone($var['phone'])
            ->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]));
        $this->em->persist($user);
        $this->em->flush();
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
        $qb = $this->em->createQueryBuilder();
        $user = $this->em->createQueryBuilder()
            ->select('u')
            ->from(UserEntity::class, 'u')
            ->where($qb->expr()->andX(
                $qb->expr()->eq('u.isAdmin', 1),
                $qb->expr()->isNull('u.deletedAt')
            ))
            ->getQuery()
            ->getArrayResult();
        return $user;
    }
    public function update(): array
    {
        try {
            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return ['error' => 'Missing input'];
            }
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);
            $email = htmlspecialchars($_PUT['email'], ENT_QUOTES);
            /** @var UserEntity $user */
            $user = $this->em->find(UserEntity::class, $id);
            if (empty($user)) {
                return ['error' => 'User not found'];
            }
            $name != $user->getName() ? $user->setName($name) : '';
            $user->setEmail($email);
            $this->em->persist($user);
            $this->em->flush();
            return ['message' => "Id $id has been updated"];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function softDelete(): array
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input'];
        }
        /** @var UserEntity $user */
        $user = $this->em->find(UserEntity::class, $id);
        if (empty($user)) {
            return ['error' => 'User not found'];
        }
        $user->setDeletedAt(new DateTime());
        $this->em->persist($user);
        $this->em->flush();
        return ['message' => "Id $id has been removed"];
    }
    public function hardDeleteUser(): array
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (empty($id)) {
            return ['error' => 'Missing Input'];
        }
        /** @var UserEntity $user */
        $user = $this->em->find(UserEntity::class, $id);
        if (empty($user)) {
            return ['error' => 'user not found'];
        }
        $user->setDeletedAt(new DateTime());
        $this->em->remove($user);
        $this->em->flush();
        return ['id' => $user->getId()];
    }
}
