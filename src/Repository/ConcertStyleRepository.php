<?php

namespace App\Repository;

use App\Entity\ConcertStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConcertStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConcertStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConcertStyle[]    findAll()
 * @method ConcertStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertStyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConcertStyle::class);
    }

    // /**
    //  * @return ConcertStyle[] Returns an array of ConcertStyle objects
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
    public function findOneBySomeField($value): ?ConcertStyle
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
