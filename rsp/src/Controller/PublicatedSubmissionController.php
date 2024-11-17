<?php

namespace App\Controller;

use App\Repository\PublicatedSubmissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicatedSubmissionController extends AbstractController
{
    private PublicatedSubmissionRepository $publicatedSubmissionRepository;

    public function __construct(PublicatedSubmissionRepository $publicatedSubmissionRepository) {
        $this->publicatedSubmissionRepository = $publicatedSubmissionRepository;
    }

    #[Route('/psub', name: 'app_psub')]
    public function index(): Response
    {
        $subs = $this->publicatedSubmissionRepository->findAllExcludingLatest();
        return $this->render('psub/index.html.twig', [
            'psubs' => $subs
        ]);
    }
}
