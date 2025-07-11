<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
#[Table('categories')]
class Category
{
    #[Id]
    #[GeneratedValue]
    #[Column(options: ['unsigned' => true])]
    private int $id;

    #[ManyToMany(targetEntity: Complaint::class, mappedBy: 'categories')]
    private Collection $complaints;

    #[Column]
    private string $name;

    public function __construct()
    {
        $this->complaints = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getComplaints(): Collection
    {
        return $this->complaints;
    }

    public function addComplaint(Complaint $complaint): void
    {
        if (!$this->complaints->contains($complaint)) {
            $this->complaints[] = $complaint;
            $complaint->addCategory($this);
        }
    }

    public function removeComplaint(Complaint $complaint): void
    {
        if (!$this->complaints->contains($complaint)) {
            return;
        }
        $this->complaints->removeElement($complaint);
        $complaint->removeCategory($this);
    }
}
