<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskNotificationController extends AbstractController
{
    #[Route('/task/notification', name: 'app_task_notification')]
    public function index(): Response
    {
        return $this->render('task_notification/index.html.twig', [
            'controller_name' => 'TaskNotificationController',
        ]);
    }
}
