<?php

namespace App\Repository;

use App\Entity\WeightLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeightLog>
 *
 * @method WeightLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeightLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeightLog[]    findAll()
 * @method WeightLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeightLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeightLog::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(WeightLog $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(WeightLog $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


}
