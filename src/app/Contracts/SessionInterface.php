<?php

namespace App\Contracts;

/**
 * Interface SessionInterface
 *
 * This interface defines the methods required for session management.
 */
interface SessionInterface
{
    public function start(): void;
    public function save(): void;
    public function isActive(): bool;
    public function regenerate(): bool;
    public function get(string $key, mixed $default = null): mixed;
    public function has(string $key): bool;
    public function put(string $key, int $getId): void;
    public function forget(string $key): void;
    public function flash(string $key, array $messages): void;
    public function getFlash(string $key): ?array;
}
