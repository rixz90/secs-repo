<?php

declare(strict_types=1);

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $container = $app->getContainer();

    // Twig
    $app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

    // Logger
    $app->addErrorMiddleware(
        displayErrorDetails: true,
        logErrors: true,
        logErrorDetails: true
    );
};
