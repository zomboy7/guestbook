<?php

namespace App\Repository;

use App\Entity\Verification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Verification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verification[]    findAll()
 * @method Verification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerificationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Verification::class);
    }

    // /**
    //  * @return Verification[] Returns an array of Verification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    public function findOneByToken($token): ?Verification
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.token = :token')
            ->setParameter('token', $token)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
