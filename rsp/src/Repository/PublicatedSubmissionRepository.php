<?php

namespace App\Repository;

use App\Entity\PublicatedSubmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PublicatedSubmission>
 */
class PublicatedSubmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublicatedSubmission::class);
    }

    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->join('p.submission', 's')         
            ->join('s.author', 'a')             
            ->join('a.user', 'u')               
            ->leftJoin('s.submitedFiles', 'sf', 'WITH', 'sf.createdAt = (SELECT MAX(sf2.createdAt) FROM App\Entity\SubmitedFile sf2 WHERE sf2.submission = s)') // Subquery to get the latest SubmitedFile
            ->select('p', 's.name', 'u.email', 'p.publicatedAt', 'sf.filename') 
            ->orderBy('p.publicatedAt', 'DESC')     
            ->setMaxResults(1)                   
            ->getQuery()
            ->getOneOrNullResult();  
    }

    public function findAllExcludingLatest()
    {
        $latestIdQuery = $this->createQueryBuilder('p2')
        ->select('p2.id')
        ->orderBy('p2.publicatedAt', 'DESC')
        ->setMaxResults(1)
        ->getQuery()
        ->getSingleScalarResult(); // Fetch the ID of the latest publication
    
    return $this->createQueryBuilder('p')
        ->join('p.submission', 's')         
        ->join('s.author', 'a')             
        ->join('a.user', 'u')               
        ->leftJoin(
            's.submitedFiles',
            'sf',
            'WITH',
            'sf.createdAt = (SELECT MAX(sf2.createdAt) FROM App\Entity\SubmitedFile sf2 WHERE sf2.submission = s)'
        )
        ->select('p', 's.name', 'u.email', 'p.publicatedAt', 'sf.filename') 
        ->where('p.id != :latestId')
        ->setParameter('latestId', $latestIdQuery) // Exclude the latest publication ID
        ->orderBy('p.publicatedAt', 'DESC')
        ->getQuery()
        ->getResult();
    
    }

}
