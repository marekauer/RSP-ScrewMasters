<?php

namespace App\Form;

use App\Entity\AuthorTeam;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class SubmitFileType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Název',
        ])
        ->add('file', FileType::class, [
            'label' => 'Článek k nahrání',
            'mapped' => false,
            'required' => true,
            'constraints' => [
                new File([
                    'maxSize' => '10M',
                    'mimeTypes' => [
                        'application/pdf',
                    ],
                    'mimeTypesMessage' => 'Prosím vyberte validní pdf dokument.',
                ]),
            ],
        ])
        ->add('team', ChoiceType::class, [
            'label' => 'Vyberte svůj tým autorů',
            'choices' => $this->getAuthorTeams(),
            'choice_label' => function (?AuthorTeam $team) {
                return $team ? $team->getName() : '';
            },
            'choice_value' => 'id',
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Nahrát',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }

    private function getAuthorTeams()
    {
        $repository = $this->entityManager->getRepository(AuthorTeam::class);
        return $repository->findAll();
    }
}
