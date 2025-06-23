<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

class DB
{
    private Connection $conn;

    public function __construct(array $config)
    {
        try {

            $paths = [$_ENV['ENTITY_PATH']];
            $isDevMode = (bool) $_ENV['DEV_MODE'] ?? false;

            $dbParams = [
                'driver'   => $config['DB_DRIVER'] ?? 'pdo_mysql',
                'user'     => $config['DB_USER'],
                'password' => $config['DB_PASS'],
                'dbname'   => $config['DB_NAME'],
            ];

            $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
            return $this->conn = DriverManager::getConnection($dbParams, $config);
        } catch (\Exception $e) {
            throw new \Exception('Database connection failed: ' . $e->getMessage());
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
        return call_user_func_array([$this->conn, $name], $arg);
    }
}
