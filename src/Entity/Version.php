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

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isRec;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isImp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $sourceId2;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isCorrectPlace;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="versions")
     */
    private ?Department $department;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="versions")
     */
    private ?Region $region;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $hasLocalVideo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $youtube2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $vk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $adrady;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isGame;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private string $drob;

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

    public function getIsRec(): bool
    {
        return $this->isRec;
    }

    public function setIsRec(bool $isRec): self
    {
        $this->isRec = $isRec;

        return $this;
    }

    public function getIsImp(): bool
    {
        return $this->isImp;
    }

    public function setIsImp(bool $isImp): self
    {
        $this->isImp = $isImp;

        return $this;
    }

    public function getSourceId2(): string
    {
        return $this->sourceId2;
    }

    public function setSourceId2(string $sourceId2): self
    {
        $this->sourceId2 = $sourceId2;

        return $this;
    }

    public function getIsCorrectPlace(): bool
    {
        return $this->isCorrectPlace;
    }

    public function setIsCorrectPlace(bool $isCorrectPlace): self
    {
        $this->isCorrectPlace = $isCorrectPlace;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getHasLocalVideo(): bool
    {
        return $this->hasLocalVideo;
    }

    public function setHasLocalVideo(bool $hasLocalVideo): self
    {
        $this->hasLocalVideo = $hasLocalVideo;

        return $this;
    }

    public function getYoutube2(): string
    {
        return $this->youtube2;
    }

    public function setYoutube2(string $youtube2): self
    {
        $this->youtube2 = $youtube2;

        return $this;
    }

    public function getVk(): string
    {
        return $this->vk;
    }

    public function setVk(string $vk): self
    {
        $this->vk = $vk;

        return $this;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getAdrady(): string
    {
        return $this->adrady;
    }

    public function setAdrady(string $adrady): self
    {
        $this->adrady = $adrady;

        return $this;
    }

    public function getIsGame(): bool
    {
        return $this->isGame;
    }

    public function setIsGame(bool $isGame): self
    {
        $this->isGame = $isGame;

        return $this;
    }

    public function getDrob(): string
    {
        return $this->drob;
    }

    public function setDrob(string $drob): self
    {
        $this->drob = $drob;

        return $this;
    }
}
