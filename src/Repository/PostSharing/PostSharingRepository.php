<?php

namespace App\Repository\PostSharing;

use App\Entity\Post;
use App\Entity\PostSharing;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PostSharing|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostSharing|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostSharing[]    findAll()
 * @method PostSharing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostSharingRepository extends ServiceEntityRepository implements PostSharingRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PostSharing::class);
    }

    public function save(PostSharing $postSharing): void
    {
        $em = $this->getEntityManager();
        $em->persist($postSharing);
        $em->flush();
    }

    public function delete(PostSharing $postSharing): void
    {
        $em = $this->getEntityManager();
        $em->remove($postSharing);
        $em->flush();
    }

    public function verifyShared(User $user, Post $post)
    {
        return $this->findOneBy(['user' => $user, 'post' => $post]);
    }

    // /**
    //  * @return PostSharing[] Returns an array of PostSharing objects
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
    public function findOneBySomeField($value): ?PostSharing
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