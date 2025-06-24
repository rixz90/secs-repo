<?php

declare(strict_types=1);

namespace App\Entities;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;

#[Entity]
#[Table('users')]
class User
{

    #[Id]
    #[GeneratedValue]
    #[Column(options: [
        'unsigned' => true
    ])]
    private int $id;


    #[Column]
    private string $name;


    #[Column]
    private string $email;


    #[Column(name: 'created_at', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTime $createdAt;

    #[Column(
        name: 'updated_at',
        nullable: true,
        options: [
            'default' => null
        ]
    )]
    private ?\DateTime $updatedAt = null;

    #[Column(
        name: 'deleted_at',
        nullable: true,
        options: [
            'default' => null
        ]
    )]
    private ?\DateTime $deletedAt = null;


    #[Column(name: 'is_admin', options: ['default' => false])]
    private bool $isAdmin;


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $created_at): User
    {
        $this->createdAt = $created_at;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updated_at = null): User
    {
        $this->updatedAt = $updated_at;
        return $this;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTime $deleted_at = null): User
    {
        $this->deletedAt = $deleted_at;
        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $is_admin = false): User
    {
        $this->isAdmin = $is_admin;
        return $this;
    }
}
