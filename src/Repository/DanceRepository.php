<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Dance;
use App\Interface\EntityExtended;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dance[]    findAll()
 * @method Dance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @extends ServiceEntityRepository<Dance::class>
 */
class DanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dance::class);
    }

    /**
     * @param EntityExtended $entity
     *
     * @return array<int, Dance>
     */
    public function findByEntityExtended(EntityExtended $entity): array
    {
        $em = $this->getEntityManager();

        $array = explode('\\', get_class($entity));
        $className = $array[array_key_last($array)];

        $query = $em->createQuery(
            'SELECT d
            FROM App\Entity\Dance d 
            JOIN App\Entity\Version v 
            JOIN App\Entity\\'.$className.' e 
            WHERE e.id = :entityId and v.'.strtolower($className).' = e.id and v.place = d.id'
        )->setParameter('entityId', $entity->getId());

        return $query->getResult();
    }

    /**
     * @return array<int, Dance>
     */
    public function findSortedByVersions(): array
    {
        $dances = $this->findAll();

        usort($dances, function ($a, $b){
            $a = count($a->getVersions());
            $b = count($b->getVersions());

            if ($a == $b) {
                return 0;
            }

            return ($a > $b) ? -1 : 1;
        });

        return $dances;
    }

    // /**
    //  * @return Dance[] Returns an array of Dance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dance
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
