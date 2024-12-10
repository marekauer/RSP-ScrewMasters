<?php

namespace App\Controller;

use App\Repository\PublicatedSubmissionRepository;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicatedSubmissionController extends AbstractController
{
    private PublicatedSubmissionRepository $publicatedSubmissionRepository;

    public function __construct(PublicatedSubmissionRepository $publicatedSubmissionRepository) {
        $this->publicatedSubmissionRepository = $publicatedSubmissionRepository;
    }

    #[Route('/psub', name: 'app_psub')]
    public function index(Request $request): Response
    {
        $queryBuilder = $this->publicatedSubmissionRepository->findAllExcludingLatest();
        $adapter = new QueryAdapter($queryBuilder);
        $pager = new Pagerfanta($adapter);
        $pager->setMaxPerPage(5);

        $pager->setCurrentPage($request->query->getInt('page', 1));
        return $this->render('psub/index.html.twig', [
            'pager' => $pager
        ]);
    }
}
