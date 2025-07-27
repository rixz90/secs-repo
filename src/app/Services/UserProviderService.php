<?php

namespace App\Services;

use App\Contracts\UserProviderServiceInterface;
use Doctrine\ORM\EntityManager;
use App\Contracts\UserInterface;
use App\Entities\User;

class UserProviderService implements UserProviderServiceInterface
{
    public function __construct(private readonly EntityManager $em) {}

    public function getById(int $userId): ?UserInterface
    {
        return $this->em->getRepository(User::class)->find($userId);
    }

    public function getByCredentials(array $credentials): ?UserInterface
    {
        return $this->em->getRepository(User::class)->findOneBy(['email' => $credentials['email']]);
    }
}
