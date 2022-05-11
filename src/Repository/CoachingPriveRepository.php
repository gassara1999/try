<?php

namespace App\Repository;

use App\Entity\CoachingPrive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingPrive>
 *
 * @method CoachingPrive|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingPrive|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingPrive[]    findAll()
 * @method CoachingPrive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingPriveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingPrive::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CoachingPrive $entity, bool $flush = true): void
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
    public function remove(CoachingPrive $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CoachingPrive[] Returns an array of CoachingPrive objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoachingPrive
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
