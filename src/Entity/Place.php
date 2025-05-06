<?php

declare(strict_types=1);

namespace App\Entity;

use App\Interface\EntityExtended;
use App\Repository\PlaceRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place implements EntityExtended
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private string $category;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="places")
     */
    private ?Department $department = null;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $lon;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $lat;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private ?string $comment = null;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="place")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="places")
     */
    private ?Region $region = null;

    private int $dancesCount = 0;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $slug;

    /**
     * @ORM\ManyToOne(targetEntity=GeoPoint::class, inversedBy="places")
     */
    private ?GeoPoint $geoPoint = null;

    public function __construct(?float $lat = null, ?float $lon = null)
    {
        $this->versions = new ArrayCollection();
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
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

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(?float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
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
            $version->setPlace($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        // set the owning side to null (unless already changed)
        if ($this->versions->removeElement($version) && $version->getPlace() === $this) {
            $version->setPlace(null);
        }

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getGeoPoint(): ?GeoPoint
    {
        return $this->geoPoint;
    }

    public function setGeoPoint(?GeoPoint $geoPoint): self
    {
        $this->geoPoint = $geoPoint;

        return $this;
    }
}
