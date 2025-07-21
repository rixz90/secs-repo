<?php

declare(strict_types=1);

use App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;
use function DI\create;

return [
    Config::class => create(Config::class)->constructor($_ENV),
    EntityManager::class => function (Config $config) {
        $ORMconfig = ORMSetup::createAttributeMetadataConfiguration([BASE_ROOT . $_ENV['ENTITY_PATH']], (bool)$_ENV['DEV_MODE']);
        $conn = DriverManager::getConnection($config->db, $ORMconfig);
        return new EntityManager($conn, $ORMconfig);
    },
    Twig::class => function (Config $config) {
        return Twig::create($config->twigPaths, $config->twigOption);
    },
];
