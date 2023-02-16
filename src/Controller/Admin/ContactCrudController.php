<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Demande de contact')
            ->setEntityLabelInPlural('Demande de contact');

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new ('id')
                ->hideOnForm(),
            TextField::new ('fullNAme'),
            TextField::new ('email')
                ->setFormTypeOption('disabled', 'disabled'),
            TextField::new ('message'),
            DateTimeField::new ('createdAt')
                ->setFormTypeOption('disabled', 'disabled'),
        ];
    }

}