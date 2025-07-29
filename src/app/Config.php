<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array $db
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $env['DB_DRIVER'],
                'host' => $env['DB_HOST'],
                'dbname' => $env['DB_NAME'],
                'user' => $env['DB_USER'],
                'password' => $env['DB_PASS']
            ],
            'twigOption' => [
                'cache' => BASE_ROOT . $env['TWIG_CACHE'],
                'debug' => (bool)$env['DEV_MODE']
            ],
            'twigPaths' => require CONFIG_PATH . '/twig_paths.php',
            'session' => [
                'name' => 'secs_session',
                'flash_key' => 'flash',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Lax' // Adjust as needed
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
