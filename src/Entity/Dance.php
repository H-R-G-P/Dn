<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DanceRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DanceRepository::class)
 */
class Dance
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
     * @ORM\Column(type="integer", options={"default":0})
     */
    private int $views = 0;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="dance")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    /**
     * @ORM\Column(type="string", length=165, unique=true)
     */
    private string $slug;

    public function __construct()
    {
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

    public function getViews(): int
    {
        return $this->views;
    }

    public function subView(): self
    {
        $this->views++;

        return $this;
    }

    /**
     * @return Collection<int, Version>
     */
    public function getVersions(): Collection
    {
        return $this->versions;
    }

    /**
     * @param Source $source
     * @return Collection<int, Version>
     */
    public function getVersionsBySource(Source $source): Collection
    {
        $allVersions = $this->versions;
        $versions = new ArrayCollection();
        foreach ($allVersions as $version) {
            if ($version->getSource() === $source || $version->getSource2() === $source) {
                $versions->add($version);
            }
        }
        return $versions;
    }

    public function addVersion(Version $version): self
    {
        if (!$this->versions->contains($version)) {
            $this->versions[] = $version;
            $version->setDance($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        // set the owning side to null (unless already changed)
        if ($this->versions->removeElement($version) && $version->getDance() === $this) {
            $version = null;
        }

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
