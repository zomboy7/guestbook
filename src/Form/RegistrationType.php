<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'auth.username',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Username',
                    'id' => 'inputUsername'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'auth.email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Email',
                    'id' => 'inputEmail'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'auth.password',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                    'id' => 'inputPassword'
                ]
            ])
            ->add('termsAccepted', CheckboxType::class, array(
                'mapped' => false,
                'constraints' => new IsTrue(),
                'label' => 'auth.terms_accepted',
                'attr' => [
                    'class' => 'custom-control-input',
                    'id' => 'Check1'
                ],
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
