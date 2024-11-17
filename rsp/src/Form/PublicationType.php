<?php

namespace App\Form;

use App\Entity\Publication;
use App\Entity\PublicationCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Název publikace',
                'constraints' => [
                    new NotBlank(['message' => 'Název publikace je povinný.'])
                ],
            ])
            ->add('publicationCategory', EntityType::class, [
                'class' => PublicationCategory::class,
                'choice_label' => 'name',
                'label' => 'Kategorie',
                'placeholder' => 'Vyberte kategorii',
                'constraints' => [
                    new NotBlank(['message' => 'Kategorie je povinná.'])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
