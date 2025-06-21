<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $name, string $email, string $password = ''): int
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email) 
             VALUES (:name, :email)"
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        return (int) $this->db->lastInsertId();
    }
    public function drop()
    {
        $stmt = $this->db->prepare(
            "DELETE FROM users"
        );
        $stmt->execute();
    }
}
