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
            'twigPaths' => [
                BASE_ROOT . $env['VIEW_PATH'],
                'common' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@common',
                'panels' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@panels',
                'layouts' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@layouts',
                'tables' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@tables',
                'forms' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@forms',
                'lists' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@lists'
            ],
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
