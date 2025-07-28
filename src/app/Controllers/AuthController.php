<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Contracts\AuthInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use App\Exceptions\ValidationException;
use App\Contracts\RequestValidatorFactoryInterface;
use App\RequestValidators\RegisterUserRequestValidator;
use App\RequestValidators\LoginUserRequestValidator;

class AuthController
{
    public function __construct(
        private readonly Twig $twig,
        private readonly RequestValidatorFactoryInterface $requestValidatorFactory,
        private readonly AuthInterface $auth
    ) {}
    public function loginView(Request $request, Response $response): Response
    {
        return $this->twig->render($response, 'auth/login.html.twig');
    }

    public function registerView(Request $request, Response $response): Response
    {
        return $this->twig->render($response, 'auth/register.html.twig');
    }

    public function register(Request $request, Response $response): Response
    {
        $data = $this->requestValidatorFactory->make(RegisterUserRequestValidator::class)->validate($request->getParsedBody());
        $this->auth->register($data);
        return $response->withHeader('Location', '/login')->withStatus(302);
    }
    public function login(Request $request, Response $response): Response
    {
        $data = $this->requestValidatorFactory->make(LoginUserRequestValidator::class)->validate($request->getParsedBody());
        if (! $this->auth->attemptLogin($data)) {
            throw new ValidationException(['password' => ['You have entered an invalid email or password']]);
        }
        return $response->withHeader('Location', '/')->withStatus(302);
    }

    public function logOut(Request $request, Response $response): Response
    {
        $this->auth->logout();
        return $response->withHeader('Location', '/login')->withStatus(302);
    }
}
