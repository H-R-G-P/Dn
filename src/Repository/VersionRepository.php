<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Source;
use App\Entity\Version;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Version|null find($id, $lockMode = null, $lockVersion = null)
 * @method Version|null findOneBy(array $criteria, array $orderBy = null)
 * @method Version[]    findAll()
 * @method Version[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @extends ServiceEntityRepository<Version>
 */
class VersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Version::class);
    }

    /**
     * @param Source $source
     *
     * @return array<int, Version>
     */
    public function findBySource(Source $source): array
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'SELECT v
            FROM App\Entity\Version v 
            JOIN App\Entity\Source s 
            WHERE s.id = :sourceId and v.source = s.id'
        )->setParameter('sourceId', $source->getId());

        $versions = $query->getResult();

        $query = $em->createQuery(
            'SELECT v
            FROM App\Entity\Version v 
            JOIN App\Entity\Source s 
            WHERE s.id = :sourceId and v.source2 = s.id'
        )->setParameter('sourceId', $source->getId());

        $versions2 = $query->getResult();

        $allVersions = array_merge($versions, $versions2);

        $uniqVersions = [];
        foreach ($allVersions as $version) {
            if ($version instanceof Version) {
                $uniqVersions[$version->getId()] = $version;
            }
        }

        return $uniqVersions;
    }

    // /**
    //  * @return Version[] Returns an array of Version objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Version
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
