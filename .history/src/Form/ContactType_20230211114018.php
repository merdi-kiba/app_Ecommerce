<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')->add(
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
            ->add('email')
            ->add('objet')
            ->add('message')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
