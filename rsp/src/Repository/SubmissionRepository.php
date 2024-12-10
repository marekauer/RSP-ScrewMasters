<?php

namespace App\Repository;

use App\Entity\Submission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Submission>
 */
class SubmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Submission::class);
    }

    public function findAllByUserIdentifier(string $userIdentifier): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.submitedFiles', 'sf')
            ->innerJoin('s.author', 'a')
            ->innerJoin('a.user', 'u')
            ->where('u.email = :userIdentifier')
            ->setParameter('userIdentifier', $userIdentifier)
            ->orderBy('s.createdAt', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findAllForPublication(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.submitedFiles', 'sf')
            ->where('s.status = 0 or s.status = 1')
            ->orderBy('s.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllForPublicationQueryBuilder()
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.submitedFiles', 'sf')
            ->where('s.status = 0 or s.status = 1')
            ->orderBy('s.createdAt', 'ASC');
    }

    public function findAllEditorSubmited(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.submitedFiles', 'sf')
            ->where('s.status = :submissionStatus')
            ->setParameter('submissionStatus', 1)
            ->orderBy('s.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllAuthorSubmited(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.submitedFiles', 'sf')
            ->where('s.status = :submissionStatus')
            ->setParameter('submissionStatus', 0)
            ->orderBy('s.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }


}
