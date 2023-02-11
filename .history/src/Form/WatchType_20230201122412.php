<?php

namespace App\Form;

use App\Entity\Watch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
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
                ]
            )
            
            
            
            ->add('description', Textarea ::class, [
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

            ->add('price', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    // 'minlength'=>'2',
                    //'maxlength'=>'50'
                ],
                'label' => 'prix',

                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])

            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de la recette',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'allow_delete' => true,
                'delete_label' => true,
                'download_label' => false,
                'download_uri' => true,
                'image_uri' => true,
                # 'imagine_pattern'=>'squared_thumbnail_small'
            ])



            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control mb-2 btn btn-primary',

                ],
                'label' => 'creer un produit'
            ])

            // ;
            
            
            //         ->add('note')
            
            //         ->add('image')
            
            //     ;
        ;}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Watch::class,
        ]);
    }
}
