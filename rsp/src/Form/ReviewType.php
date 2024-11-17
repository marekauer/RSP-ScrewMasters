<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\Submission;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timeliness')
            ->add('interest')
            ->add('usefulness')
            ->add('originality')
            ->add('professionalLevel')
            ->add('languageLevel')
            ->add('stylisticLevel')
            ->add('evaluation')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('reviewer', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('submission', EntityType::class, [
                'class' => Submission::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
