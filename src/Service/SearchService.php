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

class SearchService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;
    /**
     * @var SearchResultDTO
     */
    private SearchResultDTO $searchResultDto;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->searchResultDto = new SearchResultDTO();
        $this->searchResultDto->setDances($em->getRepository(Dance::class)->findAll());
        $this->searchResultDto->setDepartments($em->getRepository(Department::class)->findAll());
        $this->searchResultDto->setPlaces($em->getRepository(Place::class)->findAll());
        $this->searchResultDto->setRegions($em->getRepository(Region::class)->findAll());
        $this->searchResultDto->setSources($em->getRepository(Source::class)->findAll());
        $this->searchResultDto->setTypes($em->getRepository(Type::class)->findAll());
        $this->searchResultDto->setVersions($em->getRepository(Version::class)->findAll());
    }

    /**
     * @param string $input
     *
     * @return SearchResultDTO
     */
    public function findMatches(string $input): SearchResultDTO
    {
        $result = new SearchResultDTO();

        $dances = preg_grep("/.*$input.*/iu", $this->searchResultDto->getDances());
        if ($dances !== false) $result->setDances($dances);

        $departments = preg_grep("/.*$input.*/iu", $this->searchResultDto->getDepartments());
        if ($departments !== false) $result->setDepartments($departments);

        $places = preg_grep("/.*$input.*/iu", $this->searchResultDto->getPlaces());
        if ($places !== false) $result->setPlaces($places);

        $regions = preg_grep("/.*$input.*/iu", $this->searchResultDto->getRegions());
        if ($regions !== false) $result->setRegions($regions);

        $sources = preg_grep("/.*$input.*/iu", $this->searchResultDto->getSources());
        if ($sources !== false) $result->setSources($sources);

        $types = preg_grep("/.*$input.*/iu", $this->searchResultDto->getTypes());
        if ($types !== false) $result->setTypes($types);

        $versions = preg_grep("/.*$input.*/iu", $this->searchResultDto->getVersions());
        if ($versions !== false) $result->setVersions($versions);

        return $result;
    }
}