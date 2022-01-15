<?php declare(strict_types=1);


namespace App\Dto;


use App\Interface\EntityExtended;

class EntityCollectionDTO
{
    /**
     * @var EntityExtended[]
     */
    private array $regions;

    /**
     * @var EntityExtended[]
     */
    private array $departments;

    /**
     * @var EntityExtended[]
     */
    private array $types;

    /**
     * @var EntityExtended[]
     */
    private array $sources;

    /**
     * @return EntityExtended[]
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param EntityExtended[] $regions
     */
    public function setRegions(array $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * @return EntityExtended[]
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param EntityExtended[] $departments
     */
    public function setDepartments(array $departments): void
    {
        $this->departments = $departments;
    }

    /**
     * @return EntityExtended[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param EntityExtended[] $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return EntityExtended[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param EntityExtended[] $sources
     */
    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }
}