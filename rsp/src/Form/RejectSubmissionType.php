<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RejectSubmissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('submission_id', HiddenType::class)
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Zamítnout' => -2,
                    'Vrátit autorovi' => -1,
                ],
                'expanded' => false,
                'multiple' => false,
                'label' => 'Zvolte akci: ',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Potvrdit',
                'attr' => ['class' => 'btn btn-secondary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}