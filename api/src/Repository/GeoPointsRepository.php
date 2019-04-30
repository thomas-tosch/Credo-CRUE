<?php

namespace App\Repository;

use App\Entity\GeoPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GeoPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeoPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeoPoints[]    findAll()
 * @method GeoPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeoPointsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GeoPoints::class);
    }

    // /**
    //  * @return GeoPoints[] Returns an array of GeoPoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeoPoints
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
