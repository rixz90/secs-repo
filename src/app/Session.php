<?php

namespace App;

use App\Contracts\SessionInterface;
use App\Exceptions\SessionException;

class Session implements SessionInterface
{
    public function __construct(private readonly array $options = []) {}


    public function start(): void
    {
        if ($this->isActive()) {
            throw new SessionException('Session already started');
        }
        if (headers_sent($fileName, $line)) {
            throw new SessionException(
                'Headers already sent in ' . $fileName . ' on line ' . $line
            );
        }

        if (! empty($this->options['name'])) {
            session_name($this->options['name']);
        }

        session_set_cookie_params([
            'secure' => $this->options['secure'] ?? true, // Set to true if using HTTPS
            'httponly' => $this->options['httponly'] ?? true,
            'samesite' => $this->options['samesite'] ?? 'Lax', // Adjust as needed
        ]);

        session_start();
    }
    public function save(): void
    {
        session_write_close();
    }

    public function isActive(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function regenerate(): bool
    {
        return session_regenerate_id(true);
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->has($key) ? $_SESSION[$key] : $default;
    }

    public function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function flash(string $key, array $messages): void
    {
        $_SESSION[$this->options['flash_key']][$key] = $messages;
    }
    public function getFlash(string $key): array
    {
        $messages = $_SESSION[$this->options['flash_key']][$key] ?? [];
        unset($_SESSION[$this->options['flash_key']][$key]);
        return $messages;
    }
}
