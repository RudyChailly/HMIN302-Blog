<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findAll($page = 1)
    {
        return $this->findBy([], ['published' => 'DESC'], 12,($page-1)*12);
    }

    public function findAllCount() {
        return count($this->findBy([]));
    }

    public function findCategory($category, $page = 1) {
        return $this->findBy(['category' => $category], ['published' => 'DESC'], 12,($page-1)*12);
    }

    public function findCategoryCount($category) {
        return count($this->findBy(['category' => $category]));
    }

    public function findByFollows(User $user, $page = 1) {
        return $this->createQueryBuilder('a')
            ->andWhere('a.author IN (:follows)')
            ->setParameter('follows', $user->getFollows())
            ->orderBy('a.published', 'DESC')
            ->setMaxResults(12)
            ->setFirstResult(($page-1)*12)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByFollowsCount(User $user) {
        return count($this->createQueryBuilder('a')
            ->andWhere('a.author IN (:follows)')
            ->setParameter('follows', $user->getFollows())
            ->getQuery()
            ->getResult())
            ;
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
