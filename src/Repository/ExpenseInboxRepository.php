<?php

namespace App\Repository;

use App\Entity\ExpenseInbox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExpenseInbox|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseInbox|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseInbox[]    findAll()
 * @method ExpenseInbox[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseInboxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseInbox::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ExpenseInbox $entity, bool $flush = true): void
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
    public function remove(ExpenseInbox $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Sums incomplete expense inbox
     * @return int
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function sum()
    {
        return $this->createQueryBuilder('ei')
            ->select('SUM(ei.price)')->where('ei.completed <> true')
            ->getQuery()->getSingleScalarResult();
    }
}
