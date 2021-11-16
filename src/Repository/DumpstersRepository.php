<?php

namespace App\Repository;

use App\Entity\Dumpsters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dumpsters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dumpsters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dumpsters[]    findAll()
 * @method Dumpsters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DumpstersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dumpsters::class);
    }

    // /**
    //  * @return Dumpsters[] Returns an array of Dumpsters objects
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
    public function findOneBySomeField($value): ?Dumpsters
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
