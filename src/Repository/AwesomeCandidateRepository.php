<?php

namespace App\Repository;

use App\Entity\AwesomeCandidate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AwesomeCandidate|null find($id, $lockMode = null, $lockVersion = null)
 * @method AwesomeCandidate|null findOneBy(array $criteria, array $orderBy = null)
 * @method AwesomeCandidate[]    findAll()
 * @method AwesomeCandidate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AwesomeCandidateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AwesomeCandidate::class);
    }

    // /**
    //  * @return AwesomeCandidate[] Returns an array of AwesomeCandidate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AwesomeCandidate
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
