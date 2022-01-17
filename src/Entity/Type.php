<?php

namespace App\Entity;

use App\Interface\EntityExtended;
use App\Repository\TypeRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type implements EntityExtended
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="type")
     *
     * @var Collection<int, Version>
     */
    private Collection $versions;

    /**
     * @ORM\Column(type="integer")
     */
    private int $versionrs;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $is_group;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $is_man;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $is_woman;

    /**
     * @ORM\Column(type="string", length=110, unique=true)
     */
    private string $slug;

    /**
     * @var Dance[]
     */
    private array $dances = [];

    #[Pure] public function __construct()
    {
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
            $version->setType($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        if ($this->versions->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getType() === $this) {
                $version->setType(null);
            }
        }

        return $this;
    }

    public function getVersionrs(): ?int
    {
        return $this->versionrs;
    }

    public function setVersionrs(int $versionrs): self
    {
        $this->versionrs = $versionrs;

        return $this;
    }

    public function getIsGroup(): ?bool
    {
        return $this->is_group;
    }

    public function setIsGroup(bool $is_group): self
    {
        $this->is_group = $is_group;

        return $this;
    }

    public function getIsMan(): ?bool
    {
        return $this->is_man;
    }

    public function setIsMan(bool $is_man): self
    {
        $this->is_man = $is_man;

        return $this;
    }

    public function getIsWoman(): ?bool
    {
        return $this->is_woman;
    }

    public function setIsWoman(bool $is_woman): self
    {
        $this->is_woman = $is_woman;

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
     * @param Dance[] $dances
     *
     * @return void
     */
    public function setDances(array $dances): void
    {
        $this->dances = $dances;
    }

    /**
     * @return Dance[]
     */
    public function getDances(): array
    {
        return $this->dances;
    }
}
