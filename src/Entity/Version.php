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
    private $is_rec;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_imp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source_id_2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_correct_place;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="versions")
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="versions")
     */
    private $region;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_local_video;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $youtube_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adrady;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_game;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $drob;

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

    public function getIsRec(): ?bool
    {
        return $this->is_rec;
    }

    public function setIsRec(bool $is_rec): self
    {
        $this->is_rec = $is_rec;

        return $this;
    }

    public function getIsImp(): ?bool
    {
        return $this->is_imp;
    }

    public function setIsImp(bool $is_imp): self
    {
        $this->is_imp = $is_imp;

        return $this;
    }

    public function getSourceId2(): ?string
    {
        return $this->source_id_2;
    }

    public function setSourceId2(string $source_id_2): self
    {
        $this->source_id_2 = $source_id_2;

        return $this;
    }

    public function getIsCorrectPlace(): ?bool
    {
        return $this->is_correct_place;
    }

    public function setIsCorrectPlace(bool $is_correct_place): self
    {
        $this->is_correct_place = $is_correct_place;

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

    public function getHasLocalVideo(): ?bool
    {
        return $this->has_local_video;
    }

    public function setHasLocalVideo(bool $has_local_video): self
    {
        $this->has_local_video = $has_local_video;

        return $this;
    }

    public function getYoutube2(): ?string
    {
        return $this->youtube_2;
    }

    public function setYoutube2(string $youtube_2): self
    {
        $this->youtube_2 = $youtube_2;

        return $this;
    }

    public function getVk(): ?string
    {
        return $this->vk;
    }

    public function setVk(string $vk): self
    {
        $this->vk = $vk;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getAdrady(): ?string
    {
        return $this->adrady;
    }

    public function setAdrady(string $adrady): self
    {
        $this->adrady = $adrady;

        return $this;
    }

    public function getIsGame(): ?bool
    {
        return $this->is_game;
    }

    public function setIsGame(bool $is_game): self
    {
        $this->is_game = $is_game;

        return $this;
    }

    public function getDrob(): ?string
    {
        return $this->drob;
    }

    public function setDrob(string $drob): self
    {
        $this->drob = $drob;

        return $this;
    }
}
