<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Source;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Source::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Source')
            ->setEntityLabelInPlural('Sources')
            ->setSearchFields(['name', 'nameShort'])
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield TextField::new('nameShort');
        yield UrlField::new('url');
        yield TextField::new('description');
        yield TextField::new('from');
        yield TextField::new('title');
    }

}
