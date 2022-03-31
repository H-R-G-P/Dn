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
     * @ORM\Column(type="string", length=100)
     */
    private string $genre;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private string $artist;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private string $area;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="place")
     * @ORM\JoinColumn(nullable=false)
     */
    private Region $region;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="songs")
     * @ORM\JoinColumn(nullable=false)
     */
    private Place $place;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $year;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private string $record;

    /**
     * @ORM\Column(type="text")
     */
    private string $comments;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $audioOrigin;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $audioArtist;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $audioRep;

    public function getId(): ?int
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

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getRegion(): Region
    {
        return $this->region;
    }

    public function setRegion(Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPlace(): Place
    {
        return $this->place;
    }

    public function setPlace(Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRecord(): string
    {
        return $this->record;
    }

    public function setRecord(string $record): self
    {
        $this->record = $record;

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

    public function getAudioOrigin(): string
    {
        return $this->audioOrigin;
    }

    public function setAudioOrigin(string $audioOrigin): self
    {
        $this->audioOrigin = $audioOrigin;

        return $this;
    }

    public function getAudioArtist(): string
    {
        return $this->audioArtist;
    }

    public function setAudioArtist(string $audioArtist): self
    {
        $this->audioArtist = $audioArtist;

        return $this;
    }

    public function getAudioRep(): string
    {
        return $this->audioRep;
    }

    public function setAudioRep(string $audioRep): self
    {
        $this->audioRep = $audioRep;

        return $this;
    }
}
