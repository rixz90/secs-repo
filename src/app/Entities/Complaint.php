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
use Doctrine\ORM\Mapping\ManyToMany;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

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
    #[ManyToOne(targetEntity: User::class, cascade: ['remove'])]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id', onDelete: "CASCADE")]
    private User|null $user = null;

    /** Many complaints can be at Many location */
    #[ManyToMany(targetEntity: Location::class, inversedBy: 'complaints')]
    #[JoinTable(name: 'complaints_locations')]
    private Collection $locations;

    /** Many complaints can be at many branches. */
    #[ManyToMany(targetEntity: Branch::class, inversedBy: 'complaints')]
    #[JoinTable(name: 'complaints_branches')]
    private Collection $branches;

    /** Many complaints can have many categories. */
    #[ManyToMany(targetEntity: Category::class, inversedBy: 'complaints')]
    #[JoinTable(name: 'complaints_categories')]
    private Collection $categories;


    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->branches = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

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

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function getCompletedAt(): ?DateTime
    {
        return $this->completedAt;
    }

    public function setCompletedAt(?DateTime $completedAt): self
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

    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function getBranches(): Collection
    {
        return $this->branches;
    }

    public function addLocation(Location $location): void
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->addComplaint($this);
        }
    }

    public function removeLocation(Location $location): void
    {
        if (!$this->locations->contains($location)) {
            return;
        }
        $this->locations->removeElement($location);
        $location->removeComplaint($this);
    }
    public function addCategory(Category $category): void
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addComplaint($this);
        }
    }

    public function removeCategory(Category $category): void
    {
        if (!$this->categories->contains($category)) {
            return;
        }
        $this->categories->removeElement($category);
        $category->removeComplaint($this);
    }

    public function addBranch(Branch $branch): void
    {
        if (!$this->branches->contains($branch)) {
            $this->branches[] = $branch;
            $branch->addComplaint($this);
        }
    }

    public function removeBranch(Branch $branch): void
    {
        if (!$this->branches->contains($branch)) {
            return;
        }
        $this->branches->removeElement($branch);
        $branch->removeComplaint($this);
    }
}
