<?php

namespace App\Repository;

use App\Entity\TechnologieMI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TechnologieMI|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechnologieMI|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechnologieMI[]    findAll()
 * @method TechnologieMI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnologieMIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechnologieMI::class);
    }

    // /**
    //  * @return TechnologieMI[] Returns an array of TechnologieMI objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TechnologieMI
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
