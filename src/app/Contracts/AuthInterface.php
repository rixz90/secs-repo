<?php

namespace App\Contracts;

interface AuthInterface
{
    public function user(): ?UserInterface;
    public function attemptLogin(array $credentials): bool;
    public function checkCredentials(array $credentials, UserInterface $user): bool;
    public function logout(): void;
    public function login(UserInterface $user): void;
    public function register(array $data): ?UserInterface;
}
