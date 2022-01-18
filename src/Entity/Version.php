<?php declare(strict_types=1);

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
    private Dance $dance;

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

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="versions")
     */
    private ?Place $place;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="versions")
     */
    private ?Type $type;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class, inversedBy="versions")
     */
    private ?Source $source;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDance(): Dance
    {
        return $this->dance;
    }

    public function setDance(Dance $dance): self
    {
        $this->dance = $dance;

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

    public function __toString(): string
    {
        return $this->name;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): self
    {
        $this->source = $source;

        return $this;
    }
}
