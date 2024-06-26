<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeoPointRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeoPointRepository::class)
 */
class GeoPoint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="float")
     */
    private float $lat;

    /**
     * @ORM\Column(type="float")
     */
    private float $lon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $region;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $district;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $nameWordStress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $subdistrict;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $nameRu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $prefixBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $prefixRu;

    /**
     * @ORM\OneToMany(targetEntity=Place::class, mappedBy="geoPoint")
     *
     * @var Collection<int, Place>
     */
    private Collection $places;

    public function __construct()
    {
        $this->places = new ArrayCollection();
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

        return $this;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(?string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getNameWordStress(): ?string
    {
        return $this->nameWordStress;
    }

    public function setNameWordStress(?string $nameWordStress): self
    {
        $this->nameWordStress = $nameWordStress;

        return $this;
    }

    public function getSubdistrict(): ?string
    {
        return $this->subdistrict;
    }

    public function setSubdistrict(?string $subdistrict): self
    {
        $this->subdistrict = $subdistrict;

        return $this;
    }

    public function getNameRu(): ?string
    {
        return $this->nameRu;
    }

    public function setNameRu(?string $nameRu): self
    {
        $this->nameRu = $nameRu;

        return $this;
    }

    public function getPrefixBy(): ?string
    {
        return $this->prefixBy;
    }

    public function setPrefixBy(?string $prefixBy): self
    {
        $this->prefixBy = $prefixBy;

        return $this;
    }

    public function getPrefixRu(): ?string
    {
        return $this->prefixRu;
    }

    public function setPrefixRu(?string $prefixRu): self
    {
        $this->prefixRu = $prefixRu;

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
            $place->setGeoPoint($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        // set the owning side to null (unless already changed)
        if ($this->places->removeElement($place) && $place->getGeoPoint() === $this) {
            $place->setGeoPoint(null);
        }

        return $this;
    }
}
