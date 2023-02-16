<?php

namespace App\Controller\Admin;

use App\Entity\Watch;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WatchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Watch::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
