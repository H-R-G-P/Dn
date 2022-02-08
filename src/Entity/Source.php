<?php declare(strict_types=1);

namespace App\Entity;

use App\Interface\EntityExtended;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=SourceRepository::class)
 */
class Source implements EntityExtended
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
     * @ORM\Column(type="string", length=110, unique=true)
     */
    private string $slug;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private string $nameShort;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $from;

    private int $dancesCount = 0;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $title;

    /**
     * @var array<int, Version>
     */
    private array $versions;

    /**
     * Source constructor.
     */
    #[Pure] public function __construct()
    {
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
     * @return array<int, Version>
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @param Version[] $versions
     */
    public function setVersions(array $versions): void
    {
        $this->versions = $versions;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getNameShort(): string
    {
        return $this->nameShort;
    }

    public function setNameShort(string $nameShort): self
    {
        $this->nameShort = $nameShort;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    public function setFrom(?string $from): void
    {
        $this->from = $from;
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
     * @param int $dancesCount
     *
     * @return void
     */
    public function setDancesCount(int $dancesCount): void
    {
        $this->dancesCount = $dancesCount;
    }

    /**
     * @return int
     */
    public function getDancesCount(): int
    {
        return $this->dancesCount;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
