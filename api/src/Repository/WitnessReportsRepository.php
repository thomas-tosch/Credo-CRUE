<?php

namespace App\Repository;

use App\Entity\WitnessReports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WitnessReports|null find($id, $lockMode = null, $lockVersion = null)
 * @method WitnessReports|null findOneBy(array $criteria, array $orderBy = null)
 * @method WitnessReports[]    findAll()
 * @method WitnessReports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WitnessReportsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WitnessReports::class);
    }

    // /**
    //  * @return WitnessReports[] Returns an array of WitnessReports objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WitnessReports
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
