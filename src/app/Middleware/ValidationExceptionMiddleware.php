<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exceptions\ValidationException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use App\Contracts\SessionInterface;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly ResponseFactoryInterface $responseFactory,
        private readonly SessionInterface $session
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (ValidationException $e) {
            $sensitiveFields = ['password', 'confirmPassword'];
            $oldData = $request->getParsedBody();
            $this->session->flash('errors', $e->errors);
            $this->session->flash('old', array_diff_key($oldData, array_flip($sensitiveFields)));

            $response = $this->responseFactory->createResponse();
            $referer = $request->getHeaderLine('Referer');
            return $response->withHeader('Location', $referer)->withStatus(302);
        }
    }
}
