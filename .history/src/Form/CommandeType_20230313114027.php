<?php

namespace App\Form;

use App\Entity\Commende;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            
            ->add(
                'adresse',
                TextType ::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-2',
                        //'minlength'=>'2',
                        //'maxlength'=>'50'
                    ],
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ]
                ]
            )
            
            
            
            ->add('numeroTel', NumberType ::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'numeroTel',

                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('submit', SubmitType::class,
            ['attr' => [
                'class' =>'btn btn'
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commende::class,
        ]);
    }
}
