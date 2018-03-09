<?php

namespace App\Repository;

use App\Entity\MenuManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MenuManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuManager[]    findAll()
 * @method MenuManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuManagerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MenuManager::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
