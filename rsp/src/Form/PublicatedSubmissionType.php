<?php

namespace App\Form;

use App\Entity\PublicatedSubmission;
use App\Entity\Publication;
use App\Entity\Submission;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicatedSubmissionType extends AbstractType
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
            ->add('publication', EntityType::class, [
                'class' => Publication::class,
                'choice_label' => 'name',
                'placeholder' => 'Vyberte publikaci',
                'label' => 'Publikace',
                'required' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Publikovat',
                'attr' => ['class' => 'btn btn-success btn-sm mt-2'],
            ]);
        ;
    }

    private function getAllSubmissions() {
        $repository = $this->entityManager->getRepository(Submission::class);
        return $repository->findAllForPublication();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PublicatedSubmission::class,
        ]);
    }
}
