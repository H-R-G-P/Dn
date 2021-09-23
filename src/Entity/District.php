<?php

namespace App\Entity;

use App\Repository\DistrictRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=DistrictRepository::class)
 */
class District
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
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="districts")
     */
    private ?Department $department_id;

    /**
     * @ORM\OneToMany(targetEntity=Place::class, mappedBy="district_id")
     *
     * @var Collection<int, Place>
     */
    private Collection $places;

    #[Pure] public function __construct()
    {
        $this->places = new ArrayCollection();
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

    public function getDepartmentId(): ?Department
    {
        return $this->department_id;
    }

    public function setDepartmentId(?Department $department_id): self
    {
        $this->department_id = $department_id;

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
            $place->setDistrictId($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if ($place->getDistrictId() === $this) {
                $place->setDistrictId(null);
            }
        }

        return $this;
    }
}
