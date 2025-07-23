<?php

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = require __DIR__ . '/../bootstrap.php';
$router = require CONFIG_PATH . '/routes.php';
$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));
$router($app);
$app->run();
