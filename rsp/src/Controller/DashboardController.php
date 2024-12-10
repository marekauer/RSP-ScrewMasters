<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\PublicatedSubmission;
use App\Entity\Publication;
use App\Entity\ReviewSubmission;
use App\Entity\Submission;
use App\Entity\SubmitedFile;
use App\Form\PublicatedSubmissionType;
use App\Form\PublicationType;
use App\Form\RejectSubmissionType;
use App\Form\SendSubmissionToReviewersType;
use App\Form\SubmitFileType;
use App\Repository\AuthorRepository;
use App\Repository\SubmissionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Pagerfanta\Pagerfanta;

class DashboardController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private AuthorRepository $authorRepository;
    private UserRepository $userRepository;
    private SubmissionRepository $submissionRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        AuthorRepository $authorRepository,
        UserRepository $userRepository,
        SubmissionRepository $submissionRepository) {
        $this->entityManager = $entityManager;
        $this->authorRepository = $authorRepository;
        $this->userRepository = $userRepository;
        $this->submissionRepository = $submissionRepository;
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Request $request): Response
    {
        if ($this->isGranted('ROLE_AUTHOR')) {
            return $this->HandleAuthor($request);
        }
        if ($this->isGranted('ROLE_EDITOR')) {
            return $this->HandleEditor($request);
        }
        if ($this->isGranted('ROLE_EDITORCHIEF')) {
            return $this->HandleEditorChief($request);
        }
        
        return $this->render('dashboard/index.html.twig', []);  
    }

    private function HandleAuthor(Request $request) {
        $form = $this->createForm(SubmitFileType::class);

        if ($request->isMethod('POST')) {
            $submissionId = $request->request->get('submission_id');
            $formType = $request->request->get('form_type');

            if ($formType == "update_submitfile") {
                $submission = $this->submissionRepository->find($submissionId);
                if (!$submission) {
                    $this->addFlash('error', 'Nenalezen příspěvek k provázání.');
                    return $this->redirectToRoute('app_dashboard');
                }
            
                $uploadedFile = $request->files->get('file');
                if ($uploadedFile) {
                    $name = $submission->getName();
                    $newFilename = sprintf('%s_%s.%s', "upd_".date('Y-m-d_H-i-s')."_".$name, uniqid(), $uploadedFile->guessExtension());
            
                    try {
                        $uploadedFile->move($this->getParameter('uploads_directory'), $newFilename);
                        
                        $submitedFile = new SubmitedFile();
                        $submitedFile->setCreatedAt(new \DateTimeImmutable());
                        $submitedFile->setFilename($newFilename);
                        $submitedFile->setSubmission($submission);
                        
                        $submission->setStatus(0);

                        $this->entityManager->persist($submission);
                        $this->entityManager->flush();

                        $this->entityManager->persist($submitedFile);
                        $this->entityManager->flush();
            
                        $this->addFlash('success', 'Soubor byl uploadován');
                    } catch (\Exception $e) {
                        $this->addFlash('error', 'Nastala chyba při uploadování souboru.');
                    }
                } else {
                    $this->addFlash('error', 'Nebyl nahraný žádný soubor.');
                }
                return new RedirectResponse($this->generateUrl('app_dashboard'));
            }
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $uploadedFile = $form->get('file')->getData();
            $name = $data['name'];

            if ($uploadedFile) {
                $newFilename = sprintf('%s_%s.%s', $name, uniqid(), $uploadedFile->guessExtension());

                try {
                    $uploadedFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );

                    // pokud neexistuje autor vytvoř ho
                    // Author
                    $userIdentifier = $this->getUser()->getUserIdentifier();
                    $teamid = $form->get("team")->getData()->getId();
                    $author = $this->authorRepository->findAuthorByUserIdentifierAndTeamId($userIdentifier, $teamid);
                    
                    if (is_null($author)) {
                        $author = new Author();
                        $author->setUser($this->getUser());
                        $author->setTeam($form->get("team")->getData());
                        $this->entityManager->persist($author);
                        $this->entityManager->flush();
                    }

                    // Submission
                    $submission = new Submission();
                    $submission->setName($form->get("name")->getData());
                    $submission->setStatus(0);
                    $submission->setCreatedAt(new \DateTimeImmutable());
                    $submission->setAuthor($author);
                    $this->entityManager->persist($submission);
                    $this->entityManager->flush();

                    // SubmitedFile
                    $submitedFile = new SubmitedFile();
                    $submitedFile->setCreatedAt(new \DateTimeImmutable());
                    $submitedFile->setFilename($newFilename);
                    $submitedFile->setSubmission($submission);
                    $this->entityManager->persist($submitedFile);
                    $this->entityManager->flush();

                } catch (FileException $e) {
                    $this->addFlash('error', 'Nastala chyba při uploadování souboru.');
                }

                $this->addFlash('success', 'Článek byl vytvořen.');
            } else {
                $this->addFlash('error', 'Článek nebyl vytvořen.');
            }
            return new RedirectResponse($this->generateUrl('app_dashboard'));
        }

        $userIdentifier = $this->getUser()->getUserIdentifier();
        $submissions = $this->submissionRepository->findAllByUserIdentifier($userIdentifier);

        return $this->render('dashboard/index.html.twig', [
            'createsubmissionform' => $form->createView(),
            'submissions' => $submissions
        ]);   
    }

    private function HandleEditor(Request $request) {
        $rejectSubmissionForm = $this->createForm(RejectSubmissionType::class);
        $rejectSubmissionForm->handleRequest($request);
       
        // zamítnutí 
        if ($rejectSubmissionForm->isSubmitted() && $rejectSubmissionForm->isValid()) {
            $status = $rejectSubmissionForm->get('status')->getData();
            $submissionId = $rejectSubmissionForm->get('submission_id')->getData();

            if (!is_null($submissionId)) {
                $submission = $this->submissionRepository->find($submissionId);
        
                if ($submission) {
                    $submission->setStatus($status);
                    $this->entityManager->persist($submission);
                    $this->entityManager->flush();
        
                    $this->addFlash('success', 'Status článku byl změněn.');
                } else {
                    $this->addFlash('error', 'Příspěvek nebyl nalezen.');
                }
            } else {
                $this->addFlash('error', 'Příspěvek nebyl nalezen.');
            }
    
            return $this->redirectToRoute('app_dashboard');
        }

        $publicatedSubmission = new PublicatedSubmission();
        $publicatedSubmissionform = $this->createForm(PublicatedSubmissionType::class, $publicatedSubmission);
        $publicatedSubmissionform->handleRequest($request);

        // publikovaní
        if ($publicatedSubmissionform->isSubmitted() && $publicatedSubmissionform->isValid()) {
            $submission = $publicatedSubmissionform->getData()->getSubmission();

            if ($submission) {
                $submission->setStatus(2);

                $this->entityManager->persist($submission);
                $this->entityManager->flush();
                
                $publicatedSubmission->setPublicatedAt(new \DateTimeImmutable());
                $this->entityManager->persist($publicatedSubmission);
                $this->entityManager->flush();
                 
                $this->addFlash('success', 'Článek byl publikován.');
                return new RedirectResponse($this->generateUrl('app_dashboard'));
            }
        }

        $reviewers = $this->userRepository->findByRole('ROLE_REVIEWER');
        $reviewerChoices = [];
        foreach ($reviewers as $reviewer) {
            $reviewerChoices[$reviewer->getEmail()] = $reviewer->getId();
        }

        $sendSubmissionToReviewersForm = $this->createForm(SendSubmissionToReviewersType::class, null, [
            'reviewer_choices' => $reviewerChoices,
        ]);

        $sendSubmissionToReviewersForm->handleRequest($request);

        if ($sendSubmissionToReviewersForm->isSubmitted() && $sendSubmissionToReviewersForm->isValid()) {
            $data = $sendSubmissionToReviewersForm->getData();

            $submission = $data['submission'];
            if (!$submission) {
                $this->addFlash('error', 'Nenalezen příspěvek k provázání.');
                return $this->redirectToRoute('app_dashboard');
            }

            $isSubmitedToRevieweres = false;
            foreach ($data['reviewers'] as $reviewerId) {
                $reviewer = $this->userRepository->find($reviewerId);
                if ($reviewer) {
                    $reviewSubmission = new ReviewSubmission();
                    $reviewSubmission->setSubmission($submission);
                    $reviewSubmission->setReviewer($reviewer);
        
                    $this->entityManager->persist($reviewSubmission);
                    $isSubmitedToRevieweres = true;
                }
            }

            if ($isSubmitedToRevieweres) {
                $submission->setStatus(1);
                $this->entityManager->persist($submission);
                $this->entityManager->flush();
        
                $this->addFlash('success', 'Článek byl odeslán recenzentům.');
                return $this->redirectToRoute('app_dashboard');
            }

            $this->addFlash('error', 'Článek nebyl odeslán recenzentům.');
            return $this->redirectToRoute('app_dashboard');
        }

        $queryBuilder = $this->submissionRepository->findAllForPublicationQueryBuilder();
        $adapter = new QueryAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage(1);
        $pagerfanta->setCurrentPage($request->query->getInt('page', 1));

        if ($request->isMethod('POST') && $request->request->get('rejection_form')) {
            $submissionId = $request->request->get('submission_id');
            $submission = $this->submissionRepository->find($submissionId);
    
            if ($submission) {
                $this->entityManager->persist($submission);
                $this->entityManager->flush();
                $this->addFlash('success', 'Článek byl vrácen autorovi.');
            } else {
                $this->addFlash('error', 'Článek nebyl nalezen.');
            }
        }

        return $this->render('dashboard/index.html.twig', [
            'pager' => $pagerfanta,
            'publicatedSubmissionForm' => $publicatedSubmissionform,
            'sendSubmissionToReviewersForm' => $sendSubmissionToReviewersForm,
            'rejectSubmissionForm' => $rejectSubmissionForm
        ]);   
    }

    private function HandleEditorChief(Request $request) {
        $queryBuilder = $this->submissionRepository->createQueryBuilder('s')->orderBy('s.createdAt', 'DESC');
        $adapter = new QueryAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage(3);
        $pagerfanta->setCurrentPage($request->query->getInt('page', 1));

        $publication = new Publication();
        $createPublicationform = $this->createForm(PublicationType::class, $publication);
        $createPublicationform->handleRequest($request);

        if ($createPublicationform->isSubmitted() && $createPublicationform->isValid()) {
            $publication->setCreatedAt(new \DateTimeImmutable());
            $this->entityManager->persist($publication);
            $this->entityManager->flush();

            $this->addFlash('success', 'Byla vytvořena publikace.');
            return new RedirectResponse($this->generateUrl('app_dashboard'));
        }

        return $this->render('dashboard/index.html.twig', [
            'pager' => $pagerfanta,
            'createPublicationForm' => $createPublicationform->createView(),
        ]);
    }

}