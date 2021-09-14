<?php

namespace App\Controller\Admin;

use App\Entity\Dance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dance::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield SlugField::new('slug')->setTargetFieldName('name');
        yield AssociationField::new('region');
        yield AssociationField::new('type');
        yield AssociationField::new('source');
        yield IntegerField::new('views');
    }

}
