<?php

namespace App\Repository;

use App\Entity\Watch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Watch>
 *
 * @method Watch|null find($id, $lockMode = null, $lockVersion = null)
 * @method Watch|null findOneBy(array $criteria, array $orderBy = null)
 * @method Watch[]    findAll()
 * @method Watch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Watch::class);
    }

    public function save(Watch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Watch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
//     * @return Watch[] Returns an array of Watch objects
//     */
//    public function findByField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(5)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

public function findforhome(int $nb): array
{
    return $this->createQueryBuilder('r')
    ->orderBy()
}
   

//    public function findOneBySomeField($value): ?Watch
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}