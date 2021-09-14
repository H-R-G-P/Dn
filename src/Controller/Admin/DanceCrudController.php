<?php

namespace App\Controller\Admin;

use App\Entity\Dance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dance::class;
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
