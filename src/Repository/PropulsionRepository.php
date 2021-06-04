<?php

namespace App\Repository;

use App\Entity\Propulsion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Propulsion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propulsion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propulsion[]    findAll()
 * @method Propulsion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropulsionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propulsion::class);
    }

    // /**
    //  * @return Propulsion[] Returns an array of Propulsion objects
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
    public function findOneBySomeField($value): ?Propulsion
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
