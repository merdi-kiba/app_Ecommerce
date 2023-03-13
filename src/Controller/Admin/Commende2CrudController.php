<?php

namespace App\Controller\Admin;

use App\Entity\Commende;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class Commende2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commende::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         // IdField::new('id'),
    //         // TextField::new('title'),
    //         // TextEditorField::new('description'),

    //         // AssociationField::new('name')
    //     ];
    // }
    
}
