<?php declare(strict_types=1);


namespace App\Service;


use App\Dto\EntityCollectionDTO;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use App\Interface\EntityExtended;
use App\Dto\DatabaseDTO;

class DatabaseService
{
    private DatabaseDTO $database;

    public function __construct(DatabaseDTO $database)
    {
        $this->database = $database;
    }

    /** Return entities (Region, Department, Source, Type, Place) related by Dances
     *
     * @return EntityCollectionDTO
     */
    public function getEntitiesRelatedByDances(): EntityCollectionDTO
    {
        $entityCollection = new EntityCollectionDTO();

        $entityCollection->setSources($this->setDances($this->database->getSources()));
        $entityCollection->setTypes($this->setDances($this->database->getTypes()));
        $entityCollection->setRegions($this->setDances($this->database->getRegions()));
        $entityCollection->setDepartments($this->setDances($this->database->getDepartments()));
        $entityCollection->setPlaces($this->setDances($this->database->getPlaces()));

        return $entityCollection;
    }

    /**
     * @param array <int, EntityExtended> $entityCollection
     *
     * @return EntityExtended[]
     */
    public function setDances(array $entityCollection): array
    {
        foreach ($entityCollection as $entity) {
            $versions = $this->getVersionsDirectly($entity);
            $dances = array();

            foreach ($versions as $version) {
                $dance = $version->getDance();
                $dances[$dance->getId()] = $dance;
            }

            $entity->setDancesCount(count($dances));
        }

        return $entityCollection;
    }

    /** Get related versions for Source or Type.
     * @param EntityExtended $entity
     *
     * @return array<int, Version>
     */
    public function getVersionsDirectly(EntityExtended $entity): array
    {
        $filteredVersions = [];

        foreach ($this->database->getVersions() as $version) {
            if ($entity instanceof Type
                && $version->getType() !== null
                && $version->getType()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
            elseif ($entity instanceof Region
                && $version->getRegion() !== null
                && $version->getRegion()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
            elseif ($entity instanceof Department
                && $version->getDepartment() !== null
                && $version->getDepartment()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
            elseif ($entity instanceof Place
                && $version->getPlace() !== null
                && $version->getPlace()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
            elseif ($entity instanceof Source)
            {
                if     ($version->getSource()  !== null && $version->getSource()->getId()  === $entity->getId())
                    $filteredVersions[] = $version;

                elseif ($version->getSource2() !== null && $version->getSource2()->getId() === $entity->getId())
                    $filteredVersions[] = $version;
            }
        }

        return $filteredVersions;
    }

    /**
     * @return array<int, Region>
     */
    public function getTopTenRegions(): array
    {
        $regions = $this->getRegionsSortedByDances();

        return array_slice($regions, 0, 10);
    }

    /**
     * @return Region[]
     */
    public function getRegionsSortedByDances(): array
    {
        $regions = $this->database->getRegions();

        usort($regions, function ($a, $b){
            $a = $a->getDancesCount();
            $b = $b->getDancesCount();

            if ($a == $b) {
                return 0;
            }

            return ($a > $b) ? -1 : 1;
        });

        return $regions;
    }
}