<?php

namespace App\RequestValidators;

use App\Contracts\RequestValidatorInterface;
use Valitron\Validator;
use App\Exceptions\ValidationException;
use Doctrine\ORM\EntityManager;

class RegisterUserRequestValidator implements RequestValidatorInterface
{
    public function __construct(
        private readonly EntityManager $em
    ) {}

    public function validate(array $data): array
    {
        $v = new Validator($data);
        $v->rule('required', ['name', 'email', 'password', 'confirmPassword', 'phone']);
        $v->rule('regex', 'phone', '/^(\+?\d{1,3}\s?)?(\(?\d{3}\)?[\s.-]?)?\d{3}[\s.-]?\d{4}$/');
        $v->rule('email', 'email');
        $v->rule('equals', 'password', 'confirmPassword');
        $v->rule(
            fn($field, $value, $params, $fields) => !$this->em->getRepository(\App\Entities\User::class)->count(['email' => $value]),
            'email'
        )->message("{field} already taken...");

        if (!$v->validate()) {
            throw new ValidationException($v->errors());
        }

        return $data;
    }
}
