<?php

namespace App\Form;

use App\Entity\Watch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('name')
            ->add('description')
            ->add('note')
            ->add('price')
            ->add('image')
            ->add('createdAt')
            ->add('uptdatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Watch::class,
        ]);
    }
}
