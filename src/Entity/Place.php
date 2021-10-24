<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

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
    private ?Department $department_id;

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
    private ?string $comment;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="place")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="places")
     */
    private ?Region $region;

    #[Pure] public function __construct()
    {
        $this->versions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
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

        return $this;
    }

    public function getDepartmentId(): ?Department
    {
        return $this->department_id;
    }

    public function setDepartmentId(?Department $department_id): self
    {
        $this->department_id = $department_id;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
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
        if ($this->versions->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getPlace() === $this) {
                $version->setPlace(null);
            }
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
}
