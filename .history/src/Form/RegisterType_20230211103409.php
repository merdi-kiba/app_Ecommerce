<?php

namespace App\Form;

use App\Entity\User;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr'=>[
                    'class'=> 'form-control mb-2 default-form-box',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'votre nom',
                
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ]])
                ->add('plainPassword', RepeatedType ::class, [
                    'type' => PasswordType ::class,
                    'first_options' => [
                        'attr' => [
                            'class' => 'form-control default-form-box'
                        ],
    
                        'label' => 'Mot de passe',
                        'label_attr' => [
                            'class' => 'form_label default-form-box'
                        ]
                    ],
                    'second_options' => [
                        'attr' => [
                            'class' => 'form-control default-form-box'
                        ],
                        'label' => 'confirmation du mot de passe',
                        'label_attr' => [
                            'class' => 'form_label'
                        ]
                    ],
                    'invalid_message' => 'Les mots de pass ne correspondent pas.'
                ])
            ->add('nom', TextType::class,[
                'attr'=>[
                    'class'=> 'form-control mb-2 default-form-box',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'votre nom',
                
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ]])
            ->add('prenom', TextType::class,[
                'attr'=>[
                    'class'=> 'form-control mb-2 default-form-box',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'votre prenom',
                
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ]])
            ->add('postnom', TextType::class,[
                'attr'=>[
                    'class'=> 'form-control mb-2 default-form-box',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'votre postnom',
                
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ]])
            ->add('naissanceAt', DateType::class)
            ->add('submit', SubmitType  ::class, [
                'attr' => [
                    'class' => 'mb-2 btn btn-md btn-black-default-hover mb-4',

                ],
                'label' => 'créer le compte',
                
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
