<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Dance;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dance::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Dance')
            ->setEntityLabelInPlural('Dances')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsAsDropdown(false);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
    }
}
