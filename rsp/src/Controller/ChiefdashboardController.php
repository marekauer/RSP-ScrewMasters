<?php

namespace App\Controller;

use App\Entity\AuthorTeam;
use App\Entity\Author;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ChiefdashboardController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/autor_teams', name: 'app_autorteams', methods: ['GET'])]
    public function showTeamForm(EntityManagerInterface $entityManager): Response
    {
        $authors = $entityManager->getRepository(Author::class)->findAll();

        return $this->render('author_team/add_team.html.twig', [
            'authors' => $authors,
        ]);
    }

    #[Route('/autor_teams', name: 'app_autorteams', methods: ['GET'])]
    public function index(): Response
    {
        $teams = $this->entityManager->getRepository(AuthorTeam::class)->findAll();
        
        $users = $this->entityManager->getRepository(User::class)->findAll();

        $authors = $this->entityManager->getRepository(Author::class)->findAll();
        /*
        foreach ($users as $user) {
            if (in_array('ROLE_AUTHOR', $user->getRoles())) {
                $authors[] = $user;
            }
        }*/

        return $this->render('autor_teams/index.html.twig', [
            'controller_name' => 'ChiefdashboardController',
            'teams' => $teams,
            'authors' => $authors,
            'users' => $users,
        ]);
    }

    #[Route('/add-author', name: 'app_add_author', methods: ['POST'])]
    public function addAuthor(Request $request): Response
    {
        $userId = $request->request->get('user_id');
        $teamId = $request->request->get('team_id');

        try {
            $this->createAuthorRecord($userId, $teamId);
            $this->addFlash('success', 'Autor byl úspěšně přidán do týmu.');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Chyba při přidávání autora: ' . $e->getMessage());
        }

        return $this->redirectToRoute('app_autorteams');
    }

    public function createAuthorRecord(int $userId, int $teamId, EntityManagerInterface $entityManager): void
    {
        $user = $entityManager->getRepository(User::class)->find($userId);
        $team = $entityManager->getRepository(AuthorTeam::class)->find($teamId);

        if (!$user || !$team) {
            throw new \Exception('Uživatel nebo tým nebyl nalezen.');
        }

        $author = new Author();
        $author->setUser($user);
        $author->setTeam($team);

        $entityManager->persist($author);
        $entityManager->flush();
    }

    #[Route('/autor_teams/create', name: 'app_autorteams_create', methods: ['POST'])]
    public function createTeam(Request $request): Response
    {
        $teamName = $request->request->get('teamName');

        if (!$teamName) {
            $this->addFlash('error', 'Název týmu je povinný.');
            return $this->redirectToRoute('app_autorteams');
        }

        $team = new AuthorTeam();
        $team->setName($teamName);

        try {
            $this->entityManager->persist($team);
            $this->entityManager->flush();
            $this->addFlash('success', 'Tým byl úspěšně vytvořen.');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Chyba při vytváření týmu: ' . $e->getMessage());
        }

        return $this->redirectToRoute('app_autorteams');
    }

    #[Route('/autor_teams/delete/{id}', name: 'app_autorteams_delete', methods: ['POST'])]
    public function deleteTeam(int $id): Response
    {
        $team = $this->entityManager->getRepository(AuthorTeam::class)->find($id);

        if (!$team) {
            $this->addFlash('error', 'Tým nebyl nalezen.');
            return $this->redirectToRoute('app_autorteams');
        }

        try {
            $this->entityManager->remove($team);
            $this->entityManager->flush();
            $this->addFlash('success', 'Tým byl úspěšně smazán.');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Chyba při mazání týmu: ' . $e->getMessage());
        }

        return $this->redirectToRoute('app_autorteams');
    }

    #[Route('/autor_teams/edit/{id}', name: 'app_autorteams_edit', methods: ['POST'])]
    public function editTeam(Request $request, int $id): Response
    {
        $team = $this->entityManager->getRepository(AuthorTeam::class)->find($id);

        if (!$team) {
            $this->addFlash('error', 'Tým nebyl nalezen.');
            return $this->redirectToRoute('app_autorteams');
        }

        $newName = $request->request->get('teamName');

        if (!$newName) {
            $this->addFlash('error', 'Nový název týmu je povinný.');
            return $this->redirectToRoute('app_autorteams');
        }

        try {
            $team->setName($newName);
            $this->entityManager->flush();
            $this->addFlash('success', 'Název týmu byl úspěšně změněn.');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Chyba při změně názvu týmu: ' . $e->getMessage());
        }

        return $this->redirectToRoute('app_autorteams');
    }
}
