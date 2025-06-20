<?php

declare(strict_types=1);

namespace App;

use PDO;

class DB
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];


        try {
            $this->pdo = new PDO(
                $config['DB_DRIVER'] . ':host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'],
                $config['DB_USER'],
                $config['DB_PASS'],
                $config['DB_OPTIONS'] ?? $defaultOptions
            );
        } catch (\PDOException $e) {
            throw new \PDOException(
                'Database connection failed: ' . $e->getMessage(),
                (int)$e->getCode()
            );
        }
    }

    /**
     * Magic method to call PDO methods directly if call methods is inaccessible or undefined in class.
     * Proxy to PDO methods.
     * @param string $name
     * @param array $arg
     * @return mixed
     */
    public function __call(string $name, array $arg): mixed
    {
        return call_user_func_array([$this->pdo, $name], $arg);
    }
}
