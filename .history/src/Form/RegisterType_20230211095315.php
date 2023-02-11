<?php

namespace App\Form;

use App\Entity\User;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('plainPassword')
            ->add('nom', TextType::class,[
                'attr'=>[
                    'class'=> 'form-control mb-2 default-form-box',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'créer le compte',
                
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ]])
            ->add('prenom')
            ->add('postnom')
            ->add('naissanceAt', DateType::class)
            ->add('submit', SubmitType  ::class, [
                'attr' => [
                    'class' => 'form-control mb-2 btn btn-primary mt-5',

                ],
                'label' => 'créer le compte'
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
