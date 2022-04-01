<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Video::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Video')
            ->setEntityLabelInPlural('Videos')
            ->setSearchFields(['youtubeId'])
            ->setDefaultSort(['type' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('youtubeId');
        yield TextField::new('linkVk');
        yield IntegerField::new('type');
        yield AssociationField::new('version');
    }

}
