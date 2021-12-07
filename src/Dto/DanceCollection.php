<?php


namespace App\Dto;


use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;

class DanceCollection
{
    /**
     * @var array<Region, Dance[]>
     */
    private array $regions;

    /**
     * @var array<Department, Dance[]>
     */
    private array $departments;

    /**
     * @var array<Type, Dance[]>
     */
    private array $types;

    /**
     * @var array<Source, Dance[]>
     */
    private array $sources;

    /**
     * @return array<Region, Dance[]>
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param array<Region, Dance[]> $regions
     */
    public function setRegions(array $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * @return array<Department, Dance[]>
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param array<Department, Dance[]> $departments
     */
    public function setDepartments(array $departments): void
    {
        $this->departments = $departments;
    }

    /**
     * @return array<Type, Dance[]>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array<Type, Dance[]> $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return array<Source, Dance[]>
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param array<Source, Dance[]> $sources
     */
    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }
}