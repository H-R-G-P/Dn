<?php

namespace App\Repository;

use App\Entity\GeoPoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GeoPoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeoPoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeoPoint[]    findAll()
 * @method GeoPoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeoPointRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeoPoint::class);
    }

    // /**
    //  * @return GeoPoint[] Returns an array of GeoPoint objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeoPoint
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
