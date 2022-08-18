<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VersionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Version::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Version')
            ->setEntityLabelInPlural('Versions')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield AssociationField::new('type');
        yield AssociationField::new('source');
        yield AssociationField::new('source2');
        yield AssociationField::new('dance')->setRequired(true);
        yield AssociationField::new('place');
        yield AssociationField::new('department');
        yield AssociationField::new('region');
        yield BooleanField::new('isRec');
        yield BooleanField::new('isImp');
        yield BooleanField::new('isCorrectPlace');
        yield BooleanField::new('hasLocalVideo');
        yield TextField::new('comments');
        yield TextField::new('abrady');
        yield BooleanField::new('isGame');
        yield TextField::new('drob', 'Drob (1 symbol max)');
    }

}
