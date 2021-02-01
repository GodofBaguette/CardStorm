<?php

namespace App\Repository;

use App\Entity\CarteCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarteCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteCollection[]    findAll()
 * @method CarteCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteCollection::class);
    }

    // /**
    //  * @return CarteCollection[] Returns an array of CarteCollection objects
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
    public function findOneBySomeField($value): ?CarteCollection
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
