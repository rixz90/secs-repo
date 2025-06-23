<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use App\Model;

class Signup extends Model
{
    public function __construct(protected User $user)
    {
        parent::__construct();
    }

    public function register(string $name, string $email, string $password = ''): int
    {
        try {
            $this->db->beginTransaction();
            $this->user->drop();
            $this->user->create($name, $email);
            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }

        return (int) $this->db->lastInsertId();
    }
}
