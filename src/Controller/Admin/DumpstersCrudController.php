<?php

namespace App\Controller\Admin;

use App\Entity\Dumpsters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DumpstersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dumpsters::class;
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
