<?php

namespace App;

use App\Contracts\AuthInterface;
use App\Contracts\UserInterface;
use App\Contracts\SessionInterface;
use App\Contracts\UserProviderServiceInterface;

class Auth implements AuthInterface
{
    private ?UserInterface $user = null;
    public function __construct(
        private readonly UserProviderServiceInterface $userProviderService,
        private readonly SessionInterface $session,
    ) {}

    public function user(): ?UserInterface
    {
        if ($this->user !== null) {
            return $this->user;
        }
        $userId = $this->session->get('user');
        if (! $userId) {
            return null;
        }
        $user = $this->userProviderService->getById($userId);
        if (! $user) {
            return null;
        }
        $this->user = $user;
        return $this->user;
    }

    public function attemptLogin(array $credentials): bool
    {
        $user = $this->userProviderService->getByCredentials($credentials);
        if (! $user || !$this->checkCredentials($credentials, $user)) {
            return false;
        }
        $this->session->put('user', $user->getId());
        $this->session->regenerate();
        return true;
    }

    public function logout(): void
    {
        $this->session->forget('user');
        $this->session->regenerate();
        $this->user = null;
    }

    public function checkCredentials(array $credentials, UserInterface $user): bool
    {
        return password_verify($credentials['password'], $user->getPassword());
    }
}
