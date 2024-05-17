<?php

declare(strict_types=1);

namespace App\Entity;

use App\Interface\EntityExtended;
use App\Repository\DepartmentRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department implements EntityExtended
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=150, unique=true)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=110, nullable=true)
     */
    private ?string $slug;

    /**
     * @ORM\OneToMany(targetEntity=Place::class, mappedBy="department", orphanRemoval=true)
     *
     * @var Collection<int, Place>
     */
    private Collection $places;

    /**
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="department", orphanRemoval=true)
     *
     * @var Collection<int, Region>
     */
    private Collection $regions;

    private int $dancesCount = 0;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="department")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->versions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        $this->slug = Slugify::create()->slugify($name);

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places[] = $place;
            $place->setDepartment($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        // set the owning side to null (unless already changed)
        if ($this->places->removeElement($place) && $place->getDepartment() === $this) {
            $place->setDepartment(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, Region>
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setDepartment($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        // set the owning side to null (unless already changed)
        if ($this->regions->removeElement($region) && $region->getDepartment() === $this) {
            $region = null;
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function setDancesCount(int $dancesCount): void
    {
        $this->dancesCount = $dancesCount;
    }

    public function getDancesCount(): int
    {
        return $this->dancesCount;
    }

    /**
     * @return Collection<int, Version>
     */
    public function getVersions(): Collection
    {
        return $this->versions;
    }

    public function addVersion(Version $version): self
    {
        if (!$this->versions->contains($version)) {
            $this->versions[] = $version;
            $version->setDepartment($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        // set the owning side to null (unless already changed)
        if ($this->versions->removeElement($version) && $version->getDepartment() === $this) {
            $version->setDepartment(null);
        }

        return $this;
    }
}
