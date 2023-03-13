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
            
            >add('adres-se')
            ->add('numeroTel')
            
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
            
            
            
            ->add('description', NumberType ::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'description',

                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commende::class,
        ]);
    }
}
