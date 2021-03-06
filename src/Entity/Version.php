<?php declare(strict_types=1);

namespace App\Entity;

use App\Vo\AddressVO;
use App\Repository\VersionRepository;
use Cocur\Slugify\Slugify;
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
    private int $isRec;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isImp;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class)
     */
    private ?Source $source2;

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
     * @ORM\Column(type="string", length=2000)
     */
    private string $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $abrady;

    /**
     * @ORM\Column(type="boolean")
     */
    private int $isGame;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private string $drob;

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

    public function getIsRec(): int
    {
        return $this->isRec;
    }

    public function setIsRec(int $isRec): self
    {
        $this->isRec = $isRec;

        return $this;
    }

    public function getIsImp(): int
    {
        return $this->isImp;
    }

    public function setIsImp(int $isImp): self
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

    public function getIsCorrectPlace(): int
    {
        return $this->isCorrectPlace;
    }

    public function setIsCorrectPlace(int $isCorrectPlace): self
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

    public function getHasLocalVideo(): int
    {
        return $this->hasLocalVideo;
    }

    public function setHasLocalVideo(int $hasLocalVideo): self
    {
        $this->hasLocalVideo = $hasLocalVideo;

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

    public function getAbrady(): string
    {
        return $this->abrady;
    }

    public function setAbrady(string $abrady): self
    {
        $this->abrady = $abrady;

        return $this;
    }

    public function getIsGame(): int
    {
        return $this->isGame;
    }

    public function setIsGame(int $isGame): self
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
