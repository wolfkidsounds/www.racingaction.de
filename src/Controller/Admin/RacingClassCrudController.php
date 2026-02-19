<?php

namespace App\Controller\Admin;

use App\Entity\RacingClass;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RacingClassCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RacingClass::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name')->setColumns(12);
    }
}
