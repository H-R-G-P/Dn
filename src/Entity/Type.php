<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Dance::class, mappedBy="type")
     */
    private $dances;

    /**
     * @ORM\Column(type="integer")
     */
    private $dancers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_group;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_man;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_woman;

    public function __construct()
    {
        $this->dances = new ArrayCollection();
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

        return $this;
    }

    /**
     * @return Collection|Dance[]
     */
    public function getDances(): Collection
    {
        return $this->dances;
    }

    public function addDance(Dance $dance): self
    {
        if (!$this->dances->contains($dance)) {
            $this->dances[] = $dance;
            $dance->setType($this);
        }

        return $this;
    }

    public function removeDance(Dance $dance): self
    {
        if ($this->dances->removeElement($dance)) {
            // set the owning side to null (unless already changed)
            if ($dance->getType() === $this) {
                $dance->setType(null);
            }
        }

        return $this;
    }

    public function getDancers(): ?int
    {
        return $this->dancers;
    }

    public function setDancers(int $dancers): self
    {
        $this->dancers = $dancers;

        return $this;
    }

    public function getIsGroup(): ?bool
    {
        return $this->is_group;
    }

    public function setIsGroup(bool $is_group): self
    {
        $this->is_group = $is_group;

        return $this;
    }

    public function getIsMan(): ?bool
    {
        return $this->is_man;
    }

    public function setIsMan(bool $is_man): self
    {
        $this->is_man = $is_man;

        return $this;
    }

    public function getIsWoman(): ?bool
    {
        return $this->is_woman;
    }

    public function setIsWoman(bool $is_woman): self
    {
        $this->is_woman = $is_woman;

        return $this;
    }
}
