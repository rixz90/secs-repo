<?php

declare(strict_types=1);

use App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Views\Twig;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use function DI\create;


return [
    Slim\App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        $router = require CONFIG_PATH . '/routes.php';
        $addMiddleware = require CONFIG_PATH . '/middleware.php';
        $app = AppFactory::create();
        $router($app);
        $addMiddleware($app);
        return $app;
    },
    Config::class => create(Config::class)->constructor($_ENV),
    EntityManager::class => function (Config $config) {
        $ORMconfig = ORMSetup::createAttributeMetadataConfiguration([BASE_ROOT . $_ENV['ENTITY_PATH']], (bool)$_ENV['DEV_MODE']);
        $conn = DriverManager::getConnection($config->db, $ORMconfig);
        return new EntityManager($conn, $ORMconfig);
    },
    Twig::class => function (Config $config) {
        return Twig::create($config->twigPaths, $config->twigOption);
    },
    ResponseFactoryInterface::class => fn(\Slim\App $app) => $app->getResponseFactory()
];
