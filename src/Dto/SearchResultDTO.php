<?php


namespace App\Dto;


use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;

class SearchResultDTO
{
    /**
     * @var Dance[]
     */
    private array $dances = [];
    /**
     * @var Department[]
     */
    private array $departments = [];
    /**
     * @var Place[]
     */
    private array $places = [];
    /**
     * @var Region[]
     */
    private array $regions = [];
    /**
     * @var Source[]
     */
    private array $sources = [];
    /**
     * @var Type[]
     */
    private array $types = [];
    /**
     * @var Version[]
     */
    private array $versions = [];

    /**
     * @return Type[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param Type[] $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return Version[]
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

    /**
     * @return Dance[]
     */
    public function getDances(): array
    {
        return $this->dances;
    }

    /**
     * @param Dance[] $dances
     */
    public function setDances(array $dances): void
    {
        $this->dances = $dances;
    }

    /**
     * @return Department[]
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param Department[] $departments
     */
    public function setDepartments(array $departments): void
    {
        $this->departments = $departments;
    }

    /**
     * @return Place[]
     */
    public function getPlaces(): array
    {
        return $this->places;
    }

    /**
     * @param Place[] $places
     */
    public function setPlaces(array $places): void
    {
        $this->places = $places;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param Region[] $regions
     */
    public function setRegions(array $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * @return Source[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param Source[] $sources
     */
    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }
}