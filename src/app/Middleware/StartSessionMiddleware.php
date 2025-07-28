<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use App\Contracts\SessionInterface;
use Slim\Views\Twig;

class StartSessionMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly SessionInterface $session,
        private readonly Twig $twig
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->session->start();
        if ($user = $this->session->get('user')) {
            $this->twig->getEnvironment()->addGlobal('user', $user);
        }
        $response = $handler->handle($request);
        $this->session->save();
        return $response;
    }
}
