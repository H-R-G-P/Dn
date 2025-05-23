<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    public const YOUTUBE_ID = 1;
    public const VK_LINK = 2;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * 1 mean 'youtube', 2 mean 'vk'
     *
     * @ORM\Column(type="integer")
     */
    private int $type;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private ?string $youtubeId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $linkVk;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="videos")
     */
    private ?Version $version;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function getLinkVk(): ?string
    {
        return $this->linkVk;
    }

    public function setLinkVk(?string $linkVk): void
    {
        $this->linkVk = $linkVk;
    }

    public function getYoutubeId(): ?string
    {
        return $this->youtubeId;
    }

    public function setYoutubeId(?string $youtubeId): void
    {
        $this->youtubeId = $youtubeId;
    }
}
