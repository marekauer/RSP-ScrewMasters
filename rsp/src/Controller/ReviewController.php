<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\ReviewSubmission;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use App\Repository\ReviewSubmissionRepository;
use App\Repository\SubmissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewController extends AbstractController
{
    private ReviewRepository $reviewRepository;
    private ReviewSubmissionRepository $reviewSubmissionRepository;
    private SubmissionRepository $submissionRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ReviewRepository $reviewRepository,
        ReviewSubmissionRepository $reviewSubmissionRepository,
        SubmissionRepository $submissionRepository,
        EntityManagerInterface $entityManager
        ) {
        $this->reviewRepository = $reviewRepository;
        $this->reviewSubmissionRepository = $reviewSubmissionRepository;
        $this->submissionRepository = $submissionRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/review/list/{id}', name: 'app_review_show_list')]
    public function showReviewList($id): Response
    {
        if (!is_numeric($id) || (int)$id != $id || $id <= 0) {
            $this->addFlash('error', 'Nevalidní id článku, nelze zobrazit seznam recenzí.');
            return $this->redirectToRoute('app_dashboard');
        }

        $reviews = $this->reviewRepository->findBySubmissionId($id);

        return $this->render('review/reviewlist.html.twig', [
            'reviews' => $reviews,
        ]);
    }

    #[Route('/review/detail/{id}', name: 'app_review_detail')]
    public function showReviewDetail($id): Response
    {
        if (!is_numeric($id) || (int)$id != $id || $id <= 0) {
            $this->addFlash('error', 'Nevalidní id recenze, nelze zobrazit detail recenze.');
            return $this->redirectToRoute('app_dashboard');
        }

        $review = $this->reviewRepository->find($id);

        return $this->render('review/reviewdetail.html.twig', [
            'review' => $review,
        ]);
    }

    #[Route('/dashboard/reviewer', name: 'app_dashboard_reviewer')]
    public function reviewer(): Response
    {
        $user = $this->getUser();
        $reviewSubmissions = $this->reviewSubmissionRepository->findAllByReviewer($user);
        return $this->render('reviewer_dashboard/index.html.twig', [
            'reviewSubmissions' => $reviewSubmissions
        ]);
    }

    #[Route('/dashboard/reviewer/form/{id}', name: 'app_dashboard_reviewer_form')]
    public function form($id, Request $request): Response
    {
        $review = new Review();
        $reviewForm = $this->createForm(ReviewType::class, $review);
        $reviewForm->handleRequest($request);

        if ($reviewForm->isSubmitted() && $reviewForm->isValid()) {
            $review->setCreatedAt(new \DateTimeImmutable());
            $review->setReviewer($this->getUser());

            if (!is_numeric($id) || (int)$id != $id || $id <= 0) {
                $this->addFlash('error', 'Nevalidní id článku.');
                return $this->redirectToRoute('app_dashboard_reviewer');
            }
            
            $submission = $this->submissionRepository->find($id);

            if(!$submission) {
                $this->addFlash('error', 'Článek neexistuje.');
                return $this->redirectToRoute('app_dashboard_reviewer');
            }

            $review->setSubmission($submission);

            $this->entityManager->persist($review);
            $this->entityManager->flush();
    
            $submission = $review->getSubmission();
            if ($submission) {
                $reviewSubmission = $this->entityManager->getRepository(ReviewSubmission::class)->findOneBy(['submission' => $submission]);
    
                if ($reviewSubmission) {
                    $this->entityManager->remove($reviewSubmission);
                    $this->entityManager->flush();
                }
            }
    
            $this->addFlash('success', 'Recenze byla úspěšně vytvořena.');
            return $this->redirectToRoute('app_dashboard_reviewer');
        }

        return $this->render('reviewer_dashboard/form.html.twig', [
            'reviewForm' => $reviewForm
        ]);
    }
}