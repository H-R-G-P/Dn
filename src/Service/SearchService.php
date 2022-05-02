<?php


namespace App\Service;


use App\Dto\SearchResultDTO;
use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Song;
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
     * @var Dance[]
     */
    private array $dances;
    /**
     * @var Department[]
     */
    private array $departments;
    /**
     * @var Place[]
     */
    private array $places;
    /**
     * @var Region[]
     */
    private array $regions;
    /**
     * @var Song[]
     */
    private array $songs;
    /**
     * @var Source[]
     */
    private array $sources;
    /**
     * @var Type[]
     */
    private array $types;
    /**
     * @var Version[]
     */
    private array $versions;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->dances = $em->getRepository(Dance::class)->findAll();
        $this->departments = $em->getRepository(Department::class)->findAll();
        $this->places = $em->getRepository(Place::class)->findAll();
        $this->regions = $em->getRepository(Region::class)->findAll();
        $this->songs = $em->getRepository(Song::class)->findAll();
        $this->sources = $em->getRepository(Source::class)->findAll();
        $this->types = $em->getRepository(Type::class)->findAll();
        $this->versions = $em->getRepository(Version::class)->findAll();
    }

    /**
     * @param string $input
     *
     * @return SearchResultDTO
     */
    public function findMatches(string $input): SearchResultDTO
    {
        $result = new SearchResultDTO();

        $dances = preg_grep("/.*$input.*/iu", $this->dances);
        if ($dances !== false) $result->setDances($dances);

        $departments = preg_grep("/.*$input.*/iu", $this->departments);
        if ($departments !== false) $result->setDepartments($departments);

        $places = preg_grep("/.*$input.*/iu", $this->places);
        if ($places !== false) $result->setPlaces($places);

        $regions = preg_grep("/.*$input.*/iu", $this->regions);
        if ($regions !== false) $result->setRegions($regions);

        $songs = preg_grep("/.*$input.*/iu", $this->songs);
        if ($songs !== false) $result->setSongs($songs);

        $sources = preg_grep("/.*$input.*/iu", $this->sources);
        if ($sources !== false) $result->setSources($sources);

        $types = preg_grep("/.*$input.*/iu", $this->types);
        if ($types !== false) $result->setTypes($types);

        $versions = preg_grep("/.*$input.*/iu", $this->versions);
        if ($versions !== false) $result->setVersions($versions);

        return $result;
    }
}