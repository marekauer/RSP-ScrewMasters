<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Email je povinný.']),
                    new Email(['message' => 'Zadejte platnou emailovou adresu.']),
                ],
                'label' => 'Email',
            ])
            ->add('roles', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    'choices'  => [
                        'Autor' => 'ROLE_AUTHOR',
                        'Recenzent' => 'ROLE_REVIEWER',
                        'Redaktor' => 'ROLE_EDITOR',
                        'Šéfredaktor' => 'ROLE_EDITORCHIEF',
                        'Administrátor' => 'ROLE_ADMINISTRATOR'
                    ]
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Role musí být vyplněná.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Prosím zadejte heslo',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Vaše heslo musí mít alespoň {{ limit }} znaků',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
