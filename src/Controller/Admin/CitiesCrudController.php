<?php

namespace App\Controller\Admin;

use App\Entity\Cities;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cities::class;
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
