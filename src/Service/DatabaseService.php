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
use App\Vo\DatabaseVO;

class DatabaseService
{
    private DatabaseVO $database;

    public function __construct(DatabaseVO $database)
    {
        $this->database = $database;
    }

    /** Return entities (Region, Department, Source, Type) related by Dances
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
            $versions = $this->getVersionsByEntity($entity);
            $dances = array();

            foreach ($versions as $version) {
                $dances[] = $version->getDance();
            }

            $entity->setDances($dances);
        }

        return $entityCollection;
    }

    /** Get related versions for Region or Department or Source or Type.
     * @param EntityExtended $entity
     *
     * @return array<int, Version>
     */
    public function getVersionsByEntity(EntityExtended $entity): array
    {
        if ($entity::class === 'App\Entity\Region'
            || $entity::class === 'App\Entity\Department'
            || $entity::class === 'Proxies\__CG__\App\Entity\Region'
            || $entity::class === 'Proxies\__CG__\App\Entity\Department')
        {
            return $this->getVersionsAcrossPlaces($entity);
        }
        else
        {
            return $this->getVersionsDirectly($entity);
        }
    }

    /** Get related versions for Region or Department.
     * @param Region|Department $entity
     *
     * @return Version[]
     */
    public function getVersionsAcrossPlaces(Region|Department $entity): array
    {
        $places = $this->getPlacesByEntity($entity);
        $versions = array();

        foreach ($places as $place) {
            $versions = array_merge($versions, $this->getVersionsByPlace($place));
        }

        return $versions;
    }

    /** Get related versions for Source or Type.
     * @param Type|Source $entity
     *
     * @return array<int, Version>
     */
    public function getVersionsDirectly(Type|Source $entity): array
    {
        $filteredVersions = [];

        foreach ($this->database->getVersions() as $version) {
            if ($entity::class === 'App\Entity\Type'
                && $version->getType() !== null
                && $version->getType()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
            elseif ($entity::class === 'App\Entity\Source'
                && $version->getSource() !== null
                && $version->getSource()->getId() === $entity->getId())
            {
                $filteredVersions[] = $version;
            }
        }

        return $filteredVersions;
    }

    /** Get related places for Region or Department.
     * @param Region|Department $entity
     *
     * @return array<int, Place>
     */
    public function getPlacesByEntity(Region|Department $entity): array
    {
        $filteredPlaces = [];

        foreach ($this->database->getPlaces() as $place) {
            if ($entity::class === 'App\Entity\Region'
                && $place->getRegion() !== null
                && $place->getRegion()->getId() === $entity->getId())
            {
                $filteredPlaces[] = $place;
            }
            elseif ($entity::class === 'App\Entity\Department' // TODO: Remove association between Place & Department
                && $place->getDepartment() !== null
                && $place->getDepartment()->getId() === $entity->getId())
            {
                $filteredPlaces[] = $place;
            }
        }

        return $filteredPlaces;
    }

    /** Get related versions for Place.
     * @param Place $place
     *
     * @return array<int, Version>
     */
    public function getVersionsByPlace(Place $place): array
    {
        $placeId = $place->getId();
        $versions = array();

        foreach ($this->database->getVersions() as $version) {
            if ($version->getPlace() !== null
                && $version->getPlace()->getId() === $placeId)
            {
                $versions[] = $version;
            }
        }

        return $versions;
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
            $a = count($a->getDances());
            $b = count($b->getDances());

            if ($a == $b) {
                return 0;
            }

            return ($a > $b) ? -1 : 1;
        });

        return $regions;
    }
}