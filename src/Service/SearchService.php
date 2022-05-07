<?php


namespace App\Service;


use App\Dto\SearchResultDTO;
use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use Doctrine\ORM\EntityManagerInterface;
use MongoDB\BSON\Regex;

class SearchService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $input
     *
     * @return SearchResultDTO
     */
    public function findMatches(string $input): SearchResultDTO
    {
        $result = new SearchResultDTO();

        $dances = $this->em->getRepository(Dance::class)->findBy(array('name' => new Regex("/.*$input.*/iu")));
        if (count($dances) !== 0) $result->setDances($dances);

        $departments = $this->em->getRepository(Department::class)->findBy(array('name' => new Regex(".*$input.*/iu")));
        if (count($departments) !== 0) $result->setDepartments($departments);

        $places = $this->em->getRepository(Place::class)->findBy(array('name' => new Regex("/.*$input.*/iu")));
        if (count($places) !== 0) $result->setPlaces($places);

        $regions = $this->em->getRepository(Region::class)->findBy(array('name' => new Regex(".*$input.*/iu")));
        if (count($regions) !== 0) $result->setRegions($regions);

        $sources = $this->em->getRepository(Source::class)->findBy(array('name' => new Regex("/.*$input.*/iu")));
        if (count($sources) !== 0) $result->setSources($sources);

        $types = $this->em->getRepository(Type::class)->findBy(array('name' => new Regex(".*$input.*/iu")));
        if (count($types) !== 0) $result->setTypes($types);

        $versions = $this->em->getRepository(Version::class)->findBy(array('name' => new Regex("/.*$input.*/iu")));
        if (count($versions) !== 0) $result->setVersions($versions);

        return $result;
    }
}