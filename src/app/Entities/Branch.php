<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
#[Table('branches')]
class Branch
{
    #[Id]
    #[GeneratedValue]
    #[Column(options: ['unsigned' => true])]
    private int $id;

    #[Column(unique: true)]
    private string $code;

    #[Column]
    private string $name;

    #[ManyToMany(targetEntity: Location::class, mappedBy: 'branches')]
    private ?Collection $locations = null;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
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

    public function getLocations(): ?Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): void
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->addBranch($this);
        }
    }

    public function removeLocation(Location $location): void
    {
        if (!$this->locations->contains($location)) {
            return;
        }
        $this->locations->removeElement($location);
        $location->removeBranch($this);
    }
}
