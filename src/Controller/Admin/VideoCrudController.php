<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
            ->setDefaultSort(['type' => 'ASC'])
            ->showEntityActionsAsDropdown(false);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('youtubeId')->formatValue(function ($value, $entity) {
            if ($value != null) return "<a target='_blank' rel='noopener' href='https://www.youtube.com/watch?v=".$value."'>$value</a>";
            else return null;
        });
        yield TextField::new('linkVk')->formatValue(function ($value, $entity) {
            if ($value != null) return "<a target='_blank' rel='noopener' href='".$value."'>$value</a>";
            else return null;
        });
        yield ChoiceField::new('type')->setChoices([
            'Youtube Id' => Video::YOUTUBE_ID,
            'VK link' => Video::VK_LINK,
        ]);
        yield AssociationField::new('version');
    }

}
