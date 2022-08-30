<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SongRepository::class)
 */
class Song
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private string $name;

    /**
     * @ORM\Column(type="text")
     */
    private string $text;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $genre;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private ?string $artist;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private ?string $area;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private ?string $region;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private ?string $place;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private ?string $year;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private ?string $record;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $comments;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private ?string $audioOrigin;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private ?string $audioArtist;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private ?string $audioRep;

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

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRecord(): ?string
    {
        return $this->record;
    }

    public function setRecord(?string $record): self
    {
        $this->record = $record;

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

    public function getAudioOrigin(): ?string
    {
        return $this->audioOrigin;
    }

    public function setAudioOrigin(?string $audioOrigin): self
    {
        $this->audioOrigin = $audioOrigin;

        return $this;
    }

    public function getAudioArtist(): ?string
    {
        return $this->audioArtist;
    }

    public function setAudioArtist(?string $audioArtist): self
    {
        $this->audioArtist = $audioArtist;

        return $this;
    }

    public function getAudioRep(): ?string
    {
        return $this->audioRep;
    }

    public function setAudioRep(?string $audioRep): self
    {
        $this->audioRep = $audioRep;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
