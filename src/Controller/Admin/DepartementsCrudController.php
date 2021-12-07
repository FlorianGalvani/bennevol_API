<?php

namespace App\Controller\Admin;

use App\Entity\Departements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DepartementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Departements::class;
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
