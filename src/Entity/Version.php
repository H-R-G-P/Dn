<?php

namespace App\Entity;

use App\Repository\VersionRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VersionRepository::class)
 */
class Version
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Dance::class, inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private Dance $id_dance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private int $views;

    /**
     * @ORM\Column(type="string", length=110)
     */
    private string $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment": "id for youtube video"})
     */
    private ?string $youtube;

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdDance(): Dance
    {
        return $this->id_dance;
    }

    public function setIdDance(Dance $id_dance): self
    {
        $this->id_dance = $id_dance;

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

    public function getViews(): int
    {
        return $this->views;
    }

    public function subView(): self
    {
        $this->views++;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }
}
