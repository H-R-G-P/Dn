<?php declare(strict_types=1);

namespace App\Entity;

use App\Interface\EntityExtended;
use App\Repository\RegionRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region implements EntityExtended
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=110, unique=true)
     */
    private string $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="regions")
     * @ORM\JoinColumn(nullable=false)
     */
    private Department $department;

    /**
     * @ORM\OneToMany(targetEntity=Place::class, mappedBy="region")
     *
     * @var Collection<int, Place>
     */
    private Collection $places;

    private int $dancesCount = 0;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="region")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    public function __construct()
    {
        $this->places = new ArrayCollection();
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

        $this->slug = Slugify::create()->slugify($name);

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): self
    {
        $this->department = $department;

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
            $place->setRegion($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if ($place->getRegion() === $this) {
                $place->setRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return array<int, Dance>
     */
    public function getDancesFromDb() : array
    {
        $dances = [];

        foreach ($this->getVersions() as $version) {
            $dance = $version->getDance();
            $dances += [$dance->getId() => $dance];
        }

        return $dances;
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
            $version->setRegion($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        if ($this->versions->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getRegion() === $this) {
                $version->setRegion(null);
            }
        }

        return $this;
    }
}
