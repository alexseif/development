<?php

namespace App\Repository;

use App\Entity\Chronometer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chronometer>
 *
 * @method Chronometer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chronometer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chronometer[]    findAll()
 * @method Chronometer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChronometerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chronometer::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Chronometer $entity, bool $flush = true): void
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
    public function remove(Chronometer $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


}
