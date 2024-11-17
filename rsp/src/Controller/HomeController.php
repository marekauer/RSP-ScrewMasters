<?php

namespace App\Controller;

use App\Repository\PublicatedSubmissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    private PublicatedSubmissionRepository $publicatedSubmissionRepository;

    public function __construct(PublicatedSubmissionRepository $publicatedSubmissionRepository) {
        $this->publicatedSubmissionRepository = $publicatedSubmissionRepository;
    }

    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $lastPublicatedSubmission = $this->publicatedSubmissionRepository->findLatest();
        return $this->render('home/index.html.twig', [
            'lastPublicatedSubmission' => $lastPublicatedSubmission
        ]);
    }

};