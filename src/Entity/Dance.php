<?php

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
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="id_dance")
     */
    private $versions;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="dances")
     */
    private Region $region;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="dances")
     */
    private Type $type;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class, inversedBy="dances")
     */
    private Source $source;

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
     * @return Collection|Version[]
     */
    public function getVersions(): Collection
    {
        return $this->versions;
    }

    public function addVersion(Version $version): self
    {
        if (!$this->versions->contains($version)) {
            $this->versions[] = $version;
            $version->setIdDance($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        if ($this->versions->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getIdDance() === $this) {
                $version->setIdDance(null);
            }
        }

        return $this;
    }

    public function getRegion(): Region
    {
        return $this->region;
    }

    public function setRegion(Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSource(): Source
    {
        return $this->source;
    }

    public function setSource(Source $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
