<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicationController extends AbstractController
{
    #[Route('/publication', name: 'app_publication')]
    public function index(): Response
    {
        return $this->render('publication/index.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }

    #[Route('/publication_detail', name: 'app_publication_detail')]
    public function publication_detail(): Response
    {
        return $this->render('publication/publication_detail.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }
}
