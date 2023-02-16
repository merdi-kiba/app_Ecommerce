<?php

namespace App\Controller\Admin;

use App\Entity\Watch;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WatchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Watch::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::
            TextField::new('name'),
            IntegerField::new('price'),
            ImageField::new('image')
            ->setUploadDIR('public/images/products'),
            TextareaField::new('description')


          
        ];
    }
    
}
