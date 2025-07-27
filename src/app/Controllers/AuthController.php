<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Contracts\AuthInterface;
use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Valitron\Validator;
use App\Exceptions\ValidationException;
use App\Models\User as UserModel;

class AuthController
{
    public function __construct(
        private readonly Twig $twig,
        private readonly ContainerInterface $container,
        private readonly EntityManager $em,
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
        $data = $request->getParsedBody();

        $v = new Validator($data);
        $v->rule('required', ['name', 'email', 'password', 'confirmPassword', 'phone']);
        $v->rule('regex', 'phone', '/^(\+?\d{1,3}\s?)?(\(?\d{3}\)?[\s.-]?)?\d{3}[\s.-]?\d{4}$/');
        $v->rule('email', 'email');
        $v->rule('equals', 'password', 'confirmPassword');
        $v->rule(
            fn($field, $value, $params, $fields) => !$this->em->getRepository(User::class)->count(['email' => $value]),
            'email'
        )->message("{field} already taken...");

        if (!$v->validate()) {
            throw new ValidationException($v->errors());
        }
        $this->container->get(UserModel::class)->createUser($data);
        return $response->withHeader('Location', '/login')->withStatus(302);
    }
    public function login(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $v = new Validator($data);
        $v->rule('required', ['email', 'password']);
        $v->rule('email', 'email');
        if (!$v->validate()) {
            throw new ValidationException($v->errors());
        }
        if (! $this->auth->attemptLogin($data)) {
            throw new ValidationException(['password' => ['You have entered an invalid email or password']]);
        }
        return $response->withHeader('Location', '/admin')->withStatus(302);
    }

    public function logOut(Request $request, Response $response): Response
    {
        $this->auth->logout();
        return $response->withHeader('Location', '/login')->withStatus(302);
    }
}
