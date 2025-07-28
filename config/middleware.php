<?php

declare(strict_types=1);

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use App\Middleware\ValidationExceptionMiddleware;
use App\Middleware\StartSessionMiddleware;
use App\Middleware\ValidationErrorsMiddleware;
use App\Middleware\OldFormDataMiddleware;
use App\Middleware\CsrfFieldMiddleware;

return function (App $app) {
    $container = $app->getContainer();

    $app->add(CsrfFieldMiddleware::class);
    $app->add('csrf');
    // Twig
    $app->add(TwigMiddleware::create($app, $container->get(Twig::class)));
    // ValidationExceptionMiddleware
    $app->add(ValidationExceptionMiddleware::class);
    $app->add(ValidationErrorsMiddleware::class);
    $app->add(OldFormDataMiddleware::class);

    $app->add(StartSessionMiddleware::class);
    // Logger
    $app->addErrorMiddleware(
        displayErrorDetails: true,
        logErrors: true,
        logErrorDetails: true
    );
};
