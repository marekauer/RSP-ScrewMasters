<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewerDashboardController extends AbstractController
{
    #[Route('/reviewer/dashboard', name: 'app_reviewer_dashboard')]
    public function index(): Response
    {
        return $this->render('reviewer_dashboard/index.html.twig', [
            'controller_name' => 'ReviewerDashboardController',
        ]);
    }
}
