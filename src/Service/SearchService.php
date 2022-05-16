<?php


namespace App\Service;


use App\Dto\SearchResultDTO;
use Doctrine\ORM\EntityManagerInterface;

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

        $dances = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Dance', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($dances) !== 0) $result->setDances($dances);

        $departments = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Department', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($departments) !== 0) $result->setDepartments($departments);

        $places = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Place', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($places) !== 0) $result->setPlaces($places);

        $regions = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Region', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($regions) !== 0) $result->setRegions($regions);

        $sources = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Source', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($sources) !== 0) $result->setSources($sources);

        $types = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Type', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($types) !== 0) $result->setTypes($types);

        $versions = $this->em
            ->createQueryBuilder()
            ->select('e')
            ->from('App\Entity\Version', 'e')
            ->where('REGEXP(e.name, :regexp) = true')
            ->setParameter('regexp', ".*$input.*")
            ->getQuery()->getResult();
        if (count($versions) !== 0) $result->setVersions($versions);

        return $result;
    }
}