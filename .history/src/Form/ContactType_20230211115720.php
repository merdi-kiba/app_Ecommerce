<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',
                
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-2',
                       
                        //'minlength'=>'2',
                        //'maxlength'=>'50'
                    ],
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ]
            ,
            'label'=>'nom'
                ]
            )
            ->add('email',
                
            TextType::class,
            [
                'attr' => [
                    'class' => 'form-control mb-2',
                   
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
        ,
        'label'=>'nom'
            ])
            ->add('objet' ,
                
            TextType::class,
            [
                'attr' => [
                    'class' => 'form-control mb-2',
                   
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
        ,
        'label'=>'nom'
            ])
            ->add('message',
                
            TextType::class,
            [
                'attr' => [
                    'class' => 'form-control mb-2',
                   
                    //'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ]
        ,
        'label'=>'Message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
