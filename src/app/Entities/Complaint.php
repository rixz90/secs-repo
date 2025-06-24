<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use DateTime;

#[Entity]
#[Table('complaints')]
class Complaint
{
    #[Id]
    #[GeneratedValue]
    #[Column(options: ['unsigned' => true])]
    private int $id;

    #[Column]
    private string $title;

    #[Column]
    private string $description;

    #[Column]
    private string $image;

    #[Column(name: 'created_at', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private DateTime $createdAt;

    #[Column(name: 'updated_at', nullable: true)]
    private DateTime|null $updatedAt = null;

    #[Column(name: 'deleted_at', nullable: true)]
    private DateTime|null $deletedAt = null;

    #[Column(name: 'completed_at', nullable: true)]
    private DateTime|null $completedAt = null;

    #[Column]
    private string $status;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDesc(): string
    {
        return $this->description;
    }

    public function setDesc(string $desc): self
    {
        $this->description = $desc;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTime|null
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime|null $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getDeletedAt(): DateTime|null
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTime|null $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function getCompletedAt(): DateTime|null
    {
        return $this->completedAt;
    }

    public function setCompletedAt(DateTime|null $completedAt): self
    {
        $this->completedAt = $completedAt;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Complaint
    {
        $this->status = $status;
        return $this;
    }

    /** Many complaints have one user. This is the owning side. with foreign key of user */
    #[ManyToOne(targetEntity: User::class)]
    private User|null $user = null;

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Complaint
    {
        $this->user = $user;
        return $this;
    }
}
