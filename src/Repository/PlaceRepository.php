<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Dance;
use App\Entity\Place;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Place|null find($id, $lockMode = null, $lockVersion = null)
 * @method Place|null findOneBy(array $criteria, array $orderBy = null)
 * @method Place[]    findAll()
 * @method Place[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template Place
 * @extends ServiceEntityRepository<Place::class>
 */
class PlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Place::class);
    }

    /**
     * @param Dance $dance
     *
     * @return array<int, Place>
     */
    public function findByDance(Dance $dance): array
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'SELECT p
            FROM App\Entity\Place p 
            JOIN App\Entity\Version v 
            JOIN App\Entity\Dance d 
            WHERE d.id = :danceId'
        )->setParameter('danceId', $dance->getId());

        return $query->getResult();
    }

    // /**
    //  * @return Place[] Returns an array of Place objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Place
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
