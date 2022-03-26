<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * 1 mean 'youtube', 2 mean 'vk'
     *
     * @ORM\Column(type="integer")
     */
    private int $type;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private string $youtubeId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $linkVk;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="videos")
     */
    private ?Version $version;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkVk(): string
    {
        return $this->linkVk;
    }

    /**
     * @param string $linkVk
     */
    public function setLinkVk(string $linkVk): void
    {
        $this->linkVk = $linkVk;
    }

    /**
     * @return string
     */
    public function getYoutubeId(): string
    {
        return $this->youtubeId;
    }

    /**
     * @param string $youtubeId
     */
    public function setYoutubeId(string $youtubeId): void
    {
        $this->youtubeId = $youtubeId;
    }
}
