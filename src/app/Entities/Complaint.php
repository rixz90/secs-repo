<?php

declare(strict_types=1);

namespace App\Entities;

use App\Enums\ComplaintStatus;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use DateTime;
use Doctrine\ORM\Mapping\JoinColumn;

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

    #[Column(nullable: true)]
    private ?string $image = null;

    #[Column(name: 'created_at', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private DateTime $createdAt;

    #[Column(name: 'updated_at', nullable: true)]
    private ?DateTime $updatedAt = null;

    #[Column(name: 'deleted_at', nullable: true)]
    private ?DateTime $deletedAt = null;

    #[Column(name: 'completed_at', nullable: true)]
    private ?DateTime $completedAt = null;

    #[Column]
    private ComplaintStatus $status;

    /** Many complaints have one user. This is the owning side. with foreign key of user */
    #[ManyToOne(targetEntity: User::class, cascade: ['persist'])]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true, onDelete: "SET NULL")]
    private User|null $user = null;

    /** Many complaints can be at one location. This is the owning side. with foreign key of user */
    #[ManyToOne(targetEntity: Location::class, cascade: ['persist'])]
    #[JoinColumn(name: 'location_id', referencedColumnName: 'id', nullable: true, onDelete: "SET NULL")]
    private Location|null $location = null;

    /** Many complaints can be at one branch. This is the owning side. with foreign key of user */
    #[ManyToOne(targetEntity: Branch::class, cascade: ['persist'])]
    #[JoinColumn(name: 'branch_id', referencedColumnName: 'id', nullable: true, onDelete: "SET NULL")]
    private Branch|null $branch = null;

    /** Many complaints can be at one category. This is the owning side. with foreign key of user */
    #[ManyToOne(targetEntity: Category::class, cascade: ['persist'])]
    #[JoinColumn(name: 'category_id', referencedColumnName: 'id', nullable: true, onDelete: "SET NULL")]
    private Category|null $category = null;

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

    public function getImage(): string | null
    {
        return $this->image;
    }

    public function setImage(?string $image = null): self
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

    public function getStatus(): ComplaintStatus
    {
        return $this->status;
    }

    public function setStatus(ComplaintStatus $status): Complaint
    {
        $this->status = $status;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Complaint
    {
        $this->user = $user;
        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): Complaint
    {
        $this->location = $location;
        return $this;
    }

    public function getBranch(): ?Branch
    {
        return $this->branch;
    }

    public function setBranch(Branch $branch): Complaint
    {
        $this->branch = $branch;
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): Complaint
    {
        $this->category = $category;
        return $this;
    }
}
