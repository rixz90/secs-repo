<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
#[Table('locations')]
class Location
{
    #[Id]
    #[GeneratedValue]
    #[Column(options: ['unsigned' => true])]
    private int $id;

    #[Column]
    private string $address;

    /** One location can have many complaints. This is the inverse side.
     * @var Collection<Complaint>
     */
    #[OneToMany(targetEntity: Complaint::class, mappedBy: 'locations')]
    private Collection $complaints;

    #[ManyToMany(targetEntity: Branch::class, inversedBy: 'locations', cascade: ['persist', 'remove'])]
    #[JoinTable(name: 'locations_branches')]
    private ?Collection $branches;

    public function __construct()
    {
        $this->branches = new ArrayCollection();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
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
    public function addBranch(Branch $branch): void
    {
        if (!$this->branches->contains($branch)) {
            $this->branches[] = $branch;
            $branch->addLocation($this);
        }
    }
    public function getBranches(): Collection
    {
        return $this->branches;
    }
    public function removeBranch(Branch $branch): void
    {
        if (!$this->branches->contains($branch)) {
            return;
        }
        $this->branches->removeElement($branch);
        $branch->removeLocation($this);
    }
}
