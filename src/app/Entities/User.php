<?php

declare(strict_types=1);

namespace App\Entities;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
    private DateTime $createdAt;

    #[Column(
        name: 'updated_at',
        nullable: true,
        options: [
            'default' => null
        ]
    )]
    private DateTime|null $updatedAt = null;

    #[Column(
        name: 'deleted_at',
        nullable: true,
        options: [
            'default' => null
        ]
    )]
    private DateTime|null $deletedAt = null;

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

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $created_at): User
    {
        $this->createdAt = $created_at;
        return $this;
    }

    public function getUpdatedAt(): DateTime|null
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime|null $updated_at): User
    {
        $this->updatedAt = $updated_at;
        return $this;
    }

    public function getDeletedAt(): DateTime|null
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTime|null $deleted_at): User
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

    // ...
    /**
     * One user can make many complaints. This is the inverse side.
     * @var Collection<Complaint>
     */
    #[OneToMany(targetEntity: Complaint::class, mappedBy: 'users')]
    private Collection $complaints;

    public function __construct()
    {
        $this->complaints = new ArrayCollection();
    }

    public function getComplaints(): Collection
    {
        return $this->complaints;
    }

    public function addComplaint(Complaint $complaint): self
    {
        $this->complaints[] = $complaint;
        return $this;
    }
}
