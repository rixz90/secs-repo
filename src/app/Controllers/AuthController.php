<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Valitron\Validator;
use App\Exceptions\ValidationException;

class AuthController
{
    public function __construct(
        protected readonly Twig $twig,
        protected ContainerInterface $container,
        protected EntityManager $em
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
        $v->rule('required', ['name', 'email', 'password', 'confirmPassword']);
        $v->rule('email', 'email');
        $v->rule('equals', 'password', 'confirmPassword');
        $v->rule(
            fn($field, $value, $params, $fields) => !$this->em->getRepository(User::class)->count(['email' => $value]),
            'email'
        )->message("{field} already taken...");

        if ($v->validate()) {
            echo "OK";
        } else {
            throw new ValidationException($v->errors());
        }
        return $response;
    }
}
