<?php

namespace App\Repository;

use App\Entity\FileModel3D;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileModel3D|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileModel3D|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileModel3D[]    findAll()
 * @method FileModel3D[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileModel3DRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileModel3D::class);
    }

    // /**
    //  * @return FileModel3D[] Returns an array of FileModel3D objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FileModel3D
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
