<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;

class UserController
{
    public function __construct(
        protected readonly Twig $view,
        protected ContainerInterface $container
    ) {}

    public function index(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $response = $user->fetchUserById();
        return $this->view->render($response, '@tables/admin.html.twig');
    }

    public function show(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $admin = $user->fetchAllAdmin();
        return $this->view->render($response, '@tables/admin.html.twig', ["admins" => $admin]);
    }

    public function create(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $user->createUser();
        $admins = $user->fetchAllAdmin();
        return $this->view->render($response, '@tables/admin.html.twig', ["admins" => $admins]);
    }

    public function createAdmin(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $user->createAdmin();
        $admins = $user->fetchAllAdmin();
        return $this->view->render($response, '@tables/admin.html.twig', ["admins" => $admins]);
    }
    public function update(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $user->update();
        $admins = $user->fetchAllAdmin();
        return $this->view->render($response, '@tables/admin.html.twig', ["admins" => $admins]);
    }

    public function delete(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $user->softDelete();
        $admins = $user->fetchAllAdmin();
        return $this->view->render($response, '@tables/admin.html.twig', ["admins" => $admins]);
    }

    public function edit(Request $request, Response $response, array $args): ResponseInterface
    {
        $user = $this->container->get(User::class);
        $user = $user->fetchUserById($request->getAttribute('id'));
        if (empty($user)) {
            return $this->view->render($response, '@panels/adminPanel.html.twig', ["error" => $user]);
        }
        $arr['admins'] = $user;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/adminPanel.html.twig', $arr);
    }
}
