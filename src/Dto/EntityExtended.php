<?php


namespace App\Dto;


use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;

class EntityExtended
{
    /** Entity that extended by other properties in this class
     * @var Region|Department|Source|Type
     */
    private Region|Department|Source|Type $entity;

    /** Array of Dances that related with entity
     * @var Dance[]
     */
    private array $dances;

    /**
     * @return Department|Region|Source|Type
     */
    public function getEntity(): Region|Department|Source|Type
    {
        return $this->entity;
    }

    /**
     * @param Department|Region|Source|Type $entity
     */
    public function setEntity(Region|Department|Source|Type $entity): void
    {
        $this->entity = $entity;
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
}