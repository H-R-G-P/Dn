<?php


namespace App\Vo;


use App\Dto\DanceCollection;
use App\Dto\EntityExtended;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use Doctrine\ORM\EntityManagerInterface;

class Database
{
    /** All versions in database
     * @var array<int, Version>
     */
    private array $versions;

    /** All sources in database
     * @var array<int, Source>
     */
    private array $sources;

    /** All types in database
     * @var array<int, Type>
     */
    private array $types;

    /** All regions in database
     * @var array<int, Region>
     */
    private array $regions;

    /** All departments in database
     * @var array<int, Department>
     */
    private array $departments;

    /** All places in database
     * @var array<int, Place>
     */
    private array $places;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
        $this->entityManager->getRepository(Version::class)->findAll();
        $this->sources = $this->entityManager->getRepository(Source::class)->findAll();
        $this->types = $this->entityManager->getRepository(Type::class)->findAll();
        $this->regions = $this->entityManager->getRepository(Region::class)->findAll();
        $this->departments = $this->entityManager->getRepository(Department::class)->findAll();
        $this->places = $this->entityManager->getRepository(Place::class)->findAll();
    }

    /** Return entities (Region, Department, Source, Type) related by Dances
     *
     * @return DanceCollection
     */
    public function getDancesRelatedByEntities(): DanceCollection
    {
        $danceCollection = new DanceCollection();

        $danceCollection->setSources($this->getDancesBy($this->sources));
        $danceCollection->setTypes($this->getDancesBy($this->types));
        $danceCollection->setRegions($this->getDancesBy($this->regions));
        $danceCollection->setDepartments($this->getDancesBy($this->departments));

        return $danceCollection;
    }

    /**
     * @param array <int, Region|Department|Source|Type> $entityCollection
     *
     * @return EntityExtended[]
     */
    public function getDancesBy(array $entityCollection): array
    {
        $entitiesExtended = array();

        foreach ($entityCollection as $entity) {
            $versions = $this->getVersionsByEntity($entity);
            $dances = array();

            foreach ($versions as $version) {
                $dances[] = $version->getIdDance();// TODO: Rename method and propt. from "IdDance" to "Dance"
            }

            $entityExt = new EntityExtended();
            $entityExt->setEntity($entity);
            $entityExt->setDances($dances);

            $entitiesExtended[] = $entityExt;
        }

        return $entitiesExtended;
    }

    /** Get related versions for Region or Department or Source or Type.
     * @param Region|Department|Source|Type $entity
     *
     * @return array<int, Version>
     */
    public function getVersionsByEntity(Region|Department|Source|Type $entity): array
    {
        if ($entity::class === 'App\Entity\Region'
            || $entity::class === 'App\Entity\Department')
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

        foreach ($this->versions as $version) {
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

        foreach ($this->places as $place) {
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

        foreach ($this->versions as $version) {
            if ($version->getPlace() !== null
                && $version->getPlace()->getId() === $placeId)
            {
                $versions[] = $version;
            }
        }

        return $versions;
    }

    /**
     * @return array<int, Version>
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @param array<int, Version> $versions
     */
    public function setVersions(array $versions): void
    {
        $this->versions = $versions;
    }

    /**
     * @return array<int, Source>
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param array<int, Source> $sources
     */
    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }

    /**
     * @return array<int, Type>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array<int, Type> $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return array<int, Region>
     */
    public function getRegions(): array
    {
        return $this->regions;
    }

    /**
     * @param array<int, Region> $regions
     */
    public function setRegions(array $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * @return array<int, Department>
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param array<int, Department> $departments
     */
    public function setDepartments(array $departments): void
    {
        $this->departments = $departments;
    }

    /**
     * @return array<int, Place>
     */
    public function getPlaces(): array
    {
        return $this->places;
    }

    /**
     * @param array<int, Place> $places
     */
    public function setPlaces(array $places): void
    {
        $this->places = $places;
    }
}