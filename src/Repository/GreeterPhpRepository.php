<?php

namespace App\Repository;

use App\Entity\GreeterPhp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GreeterPhp|null find($id, $lockMode = null, $lockVersion = null)
 * @method GreeterPhp|null findOneBy(array $criteria, array $orderBy = null)
 * @method GreeterPhp[]    findAll()
 * @method GreeterPhp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreeterPhpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GreeterPhp::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('g')
            ->where('g.something = :value')->setParameter('value', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
