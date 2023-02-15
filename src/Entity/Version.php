<?php declare(strict_types=1);

namespace App\Entity;

use App\Vo\AddressVO;
use App\Repository\VersionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private int $views=0;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="versions")
     */
    private ?Place $place;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="versions")
     */
    private ?Type $type;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class)
     */
    private ?Source $source;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isRec;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isImp;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class)
     */
    private ?Source $source2;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isCorrectPlace;

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
    private bool $hasLocalVideo;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private ?string $comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $abrady;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isGame;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private ?string $drob;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="version")
     *
     * @var Collection<int, Video>
     */
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function __toString(): string
    {
        return $this->id.','.$this->dance.','.$this->type.','.$this->source.','.$this->place;
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

    public function getSource2(): ?Source
    {
        return $this->source2;
    }

    public function setSource2(?Source $source2): self
    {
        $this->source2 = $source2;

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

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getAbrady(): ?string
    {
        return $this->abrady;
    }

    public function setAbrady(?string $abrady): self
    {
        $this->abrady = $abrady;

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

    public function getDrob(): ?string
    {
        return $this->drob;
    }

    public function setDrob(?string $drob): self
    {
        $this->drob = $drob;

        return $this;
    }

    public function getAddress(string $language): AddressVO
    {
        return new AddressVO($this, $language);
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setVersion($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getVersion() === $this) {
                $video->setVersion(null);
            }
        }

        return $this;
    }
}
