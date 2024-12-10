<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\Submission;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    private EntityManagerInterface $entityManager;
    private Security $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timeliness', ChoiceType::class, [
                'label' => 'Časovost',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check space-between-options'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('interest', ChoiceType::class, [
                'label' => 'Zajímavost',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('usefulness', ChoiceType::class, [
                'label' => 'Užitečnost',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('originality', ChoiceType::class, [
                'label' => 'Originalita',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('professionalLevel', ChoiceType::class, [
                'label' => 'Profesní úroveň',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('languageLevel', ChoiceType::class, [
                'label' => 'Jazyková úroveň',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('stylisticLevel', ChoiceType::class, [
                'label' => 'Stylistická úroveň',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('evaluation', ChoiceType::class, [
                'label' => 'Celkové Hodnocení',
                'choices' => [
                    '1 - Velmi špatné' => 1,
                    '2 - Špatné' => 2,
                    '3 - Průměrné' => 3,
                    '4 - Dobré' => 4,
                    '5 - Výborné' => 5,
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'choice_attr' => function () {
                    return ['style' => 'margin-right: 2px;margin-left: 10px;'];
                },
                'data' => 5
            ])
            ->add('createdAt', HiddenType::class, [
                'label' => false
            ])
            ->add('reviewer', HiddenType::class, [
                'label' => false,
            ])
            ->add('submission', HiddenType::class, [
                'label' => false,
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Text recenze',           
                'required' => false,             
                'attr' => [
                    'rows' => 4,               
                    'cols' => 50,              
                    'placeholder' => 'Zadejte text recenze...', 
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
