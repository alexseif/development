<?php

namespace App\Repository;

use App\Entity\Intention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Intention>
 *
 * @method Intention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intention[]    findAll()
 * @method Intention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntentionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intention::class);
    }

    public function add(Intention $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Intention $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
