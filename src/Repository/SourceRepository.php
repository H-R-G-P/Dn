<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Source;
use App\Entity\Version;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Source>
 */
class SourceRepository extends ServiceEntityRepository
{
    /**
     * @var EntityRepository<Version>
     */
    private EntityRepository $versionRepository;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Source::class);
        $this->versionRepository = $this->_em->getRepository(Version::class);
    }

    /**
     * @return Source[]
     */
    public function findAll(): array
    {
        $query = $this->_em->createQuery(
            'SELECT s
            FROM App\Entity\Source s'
        );

        $sources = $query->getResult();

        foreach ($sources as $source) {
            $source->setVersions($this->versionRepository->findBySource($source));
        }

        return $sources;
    }

    /**
     * Finds an entity by its primary key / identifier.
     *
     * @param mixed    $id          The identifier.
     * @param int|null $lockMode    One of the \Doctrine\DBAL\LockMode::* constants
     *                              or NULL if no specific lock mode should be used
     *                              during the search.
     * @param int|null $lockVersion The lock version.
     *
     * @return Source|null The entity instance or NULL if the entity can not be found.
     */
    public function find(mixed $id, $lockMode = null, $lockVersion = null): ?Source
    {
        $source = $this->_em->find(Source::class, $id);

        if ($source instanceof Source) {
            $source->setVersions($this->versionRepository->findBySource($source));
        }

        return $source;
    }

    /**
     * Finds entities by a set of criteria.
     *
     * @param int|null $limit
     * @param int|null $offset
     * @psalm-param array<string, mixed> $criteria
     * @psalm-param array<string, string>|null $orderBy
     *
     * @return object[] The objects.
     */
    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        $persister = $this->_em->getUnitOfWork()->getEntityPersister(Source::class);

        $sources = $persister->loadAll($criteria, $orderBy, $limit, $offset);

        foreach ($sources as $source) {
            $source->setVersions($this->versionRepository->findBySource($source));
        }

        return $sources;
    }

    /**
     * Finds a single entity by a set of criteria.
     *
     * @psalm-param array<string, mixed> $criteria
     * @psalm-param array<string, string>|null $orderBy
     *
     * @return object|null The entity instance or NULL if the entity can not be found.
     */
    public function findOneBy(array $criteria, ?array $orderBy = null)
    {
        $persister = $this->_em->getUnitOfWork()->getEntityPersister(Source::class);

        $source = $persister->load($criteria, null, null, [], null, 1, $orderBy);

        if ($source instanceof Source) {
            $source->setVersions($this->versionRepository->findBySource($source));
        }

        return $source;
    }
}
