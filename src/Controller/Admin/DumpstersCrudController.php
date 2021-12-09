<?php

namespace App\Controller\Admin;

use App\Entity\Dumpsters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class DumpstersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dumpsters::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)

        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id'),
            NumberField::new('Lng'),
            NumberField::new('Lat'),
            AssociationField::new('city'),
            AssociationField::new('reports')->hideOnForm(),

        ];
    }
    
}
