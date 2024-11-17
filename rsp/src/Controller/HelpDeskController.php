<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelpDeskController extends AbstractController
{
    #[Route('/helpdesk', name: 'app_helpdesk')]
    public function index(): Response
    {
        return $this->render('helpdesk/index.html.twig', [
            'controller_name' => 'HelpdeskController',
        ]);
    }
}
