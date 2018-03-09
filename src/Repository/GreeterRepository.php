<?php

namespace App\Repository;

use App\Entity\Greeter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Greeter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Greeter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Greeter[]    findAll()
 * @method Greeter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreeterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Greeter::class);
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
