<?php


namespace App\Vo;


use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use Doctrine\ORM\EntityManagerInterface;

class DatabaseVO
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
        $this->versions = $this->entityManager->getRepository(Version::class)->findAll();
        $this->sources = $this->entityManager->getRepository(Source::class)->findAll();
        $this->types = $this->entityManager->getRepository(Type::class)->findAll();
        $this->regions = $this->entityManager->getRepository(Region::class)->findAll();
        $this->departments = $this->entityManager->getRepository(Department::class)->findAll();
        $this->places = $this->entityManager->getRepository(Place::class)->findAll();
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