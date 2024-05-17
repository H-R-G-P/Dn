<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Song;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SongCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Song::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Song')
            ->setEntityLabelInPlural('Songs')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsAsDropdown(false);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield TextEditorField::new('text');
        yield TextField::new('genre');
        yield TextField::new('artist');
        yield TextField::new('area')->hideOnIndex();
        yield TextField::new('year')->hideOnIndex();
        yield TextField::new('record')->hideOnIndex();
        yield TextField::new('comments')->hideOnIndex();
        yield TextField::new('audio_origin')->hideOnIndex();
        yield TextField::new('audio_artist')->hideOnIndex();
        yield TextField::new('audio_rep')->hideOnIndex();
        yield TextField::new('region')->hideOnIndex();
        yield TextField::new('place')->hideOnIndex();
    }
}
