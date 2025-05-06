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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

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

    private int $versionAmounts = 0;

    /**
     * @ORM\Column(type="string", length=165, unique=true)
     */
    private string $slug;

    public function __construct()
    {
        $this->versions = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getVersionAmounts(): int
    {
        return $this->versionAmounts;
    }

    public function addVersionAmount(): void
    {
        $this->versionAmounts++;
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
