<?php

namespace App\RequestValidators;

use App\Contracts\RequestValidatorFactoryInterface;
use App\Contracts\RequestValidatorInterface;
use Psr\Container\ContainerInterface;

class RequestValidatorFactory implements RequestValidatorFactoryInterface
{
    public function __construct(
        private readonly ContainerInterface $container
    ) {}

    public function make(string $class): RequestValidatorInterface
    {
        $validator = $this->container->get($class);

        if ($validator instanceof RequestValidatorInterface) {
            return $validator;
        }

        throw new \RuntimeException("Failed to resolve RequestValidatorFactory $class class");
    }
}
