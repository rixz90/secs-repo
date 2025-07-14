<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\ORMSetup;

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders
$paths = [dirname(__DIR__) . '/' . $_ENV['ENTITY_PATH']];

$isDevMode = true;

$dbParams = [
    'driver'   => $_ENV['DB_DRIVER'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname'   => $_ENV['DB_NAME'],
];

$ORMconfig = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$conn = DriverManager::getConnection($dbParams, $ORMconfig);
$entityManager = new EntityManager($conn, $ORMconfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
