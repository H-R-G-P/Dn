<?php


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
        yield TextField::new('area');
        yield TextField::new('year');
        yield TextField::new('record');
        yield TextField::new('comments');
        yield TextField::new('audio_origin');
        yield TextField::new('audio_artist');
        yield TextField::new('audio_rep');
        yield TextField::new('region');
        yield TextField::new('place');
    }

}
