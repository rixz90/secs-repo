<?php

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/path_constants.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = require CONFIG_PATH . '/container.php';
$router = require CONFIG_PATH . '/routes.php';

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));
$router($app);
$app->run();
