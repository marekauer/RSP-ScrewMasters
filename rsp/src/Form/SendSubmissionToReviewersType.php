<?php
namespace App\Form;

use App\Entity\Submission;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendSubmissionToReviewersType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('submission', EntityType::class, [
                'class' => Submission::class,
                'placeholder' => 'Vyberte článek',
                'choices' => $this->getAllSubmissions(),
                'choice_label' => function (?Submission $submission) {
                    return $submission ? $submission->getName() : '';
                },
                'choice_value' => 'id',
                'label' => 'Článek',
                'required' => true,
            ])
            ->add('reviewers', ChoiceType::class, [
                'choices' => $options['reviewer_choices'],
                'multiple' => true,
                'expanded' => true,
                'label' => 'Vyberte recenzenty:',
                'attr' => ['class' => 'form-control'],
                'required' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'reviewer_choices' => [],
        ]);
    }

    private function getAllSubmissions() {
        $repository = $this->entityManager->getRepository(Submission::class);
        return $repository->findAllAuthorSubmited();
    }
}