<?php declare(strict_types=1);

namespace App\Entity;

use App\Interface\EntityExtended;
use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

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

    #[Pure] public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->versions = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
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
        if ($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if ($place->getDepartment() === $this) {
                $place->setDepartment(null);
            }
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
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getDepartment() === $this) {
                $region = null;
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @param int $dancesCount
     *
     * @return void
     */
    public function setDancesCount(int $dancesCount): void
    {
        $this->dancesCount = $dancesCount;
    }

    /**
     * @return int
     */
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
        if ($this->versions->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getDepartment() === $this) {
                $version->setDepartment(null);
            }
        }

        return $this;
    }
}
