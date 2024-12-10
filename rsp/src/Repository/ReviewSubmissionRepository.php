<?php

namespace App\Repository;

use App\Entity\ReviewSubmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

/**
 * @extends ServiceEntityRepository<ReviewSubmission>
 */
class ReviewSubmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReviewSubmission::class);
    }

    public function findAllByReviewer(User $user)
    {
        return $this->createQueryBuilder('r')
            ->innerJoin('r.reviewer', 'u')
            ->where('u = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}
