<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
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
     * @ORM\OneToMany(targetEntity=Dance::class, mappedBy="region")
     *
     * @var Collection<int, Dance>
     */
    private Collection $dances;

    /**
     * @ORM\Column(type="string", length=110, unique=true)
     */
    private string $slug;

    #[Pure] public function __construct()
    {
        $this->dances = new ArrayCollection();
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

    /**
     * @return Collection<int, Dance>
     */
    public function getDances(): Collection
    {
        return $this->dances;
    }

    public function addDance(Dance $dance): self
    {
        if (!$this->dances->contains($dance)) {
            $this->dances[] = $dance;
            $dance->setRegion($this);
        }

        return $this;
    }

    public function removeDance(Dance $dance): self
    {
        if ($this->dances->removeElement($dance)) {
            // set the owning side to null (unless already changed)
            if ($dance->getRegion() === $this) {
                $dance->setRegion(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
