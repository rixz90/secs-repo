<?php

namespace App\Services;

use App\Contracts\UserProviderServiceInterface;
use Doctrine\ORM\EntityManager;
use App\Contracts\UserInterface;
use App\Entities\User as UserEntity;
use App\Models\User;
use Psr\Container\ContainerInterface;

class UserProviderService implements UserProviderServiceInterface
{
    public function __construct(
        private readonly EntityManager $em,
        private readonly ContainerInterface $container
    ) {}

    public function getById(int $userId): ?UserInterface
    {
        return $this->em->getRepository(UserEntity::class)->find($userId);
    }
    public function getByCredentials(array $credentials): ?UserInterface
    {
        return $this->em->getRepository(UserEntity::class)->findOneBy(['email' => $credentials['email']]);
    }
    public function createUser(array $data): ?UserInterface
    {
        $user = $this->container->get(User::class)->createUser($data);
        return $user;
    }
}
