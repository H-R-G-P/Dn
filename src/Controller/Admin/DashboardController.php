<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Dance;
use App\Entity\Department;
use App\Entity\Place;
use App\Entity\Region;
use App\Entity\Song;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator,
    ) {
    }

    /**
     * @Route("/{_locale}/admin",
     *     locale="by",
     *     requirements={
     *         "_locale": "by|en",
     *     },
     *     name="admin"
     * )
     */
    public function index(): Response
    {
        return $this->redirect($this->adminUrlGenerator->setController(DanceCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Menu')
            ->setFaviconPath('/build/images/admin-icon.ico');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('To the site', 'fas fa-home', 'homepage')
            ->setLinkTarget('_blank');
        yield MenuItem::linkToCrud('Dances', 'fas fa-user-friends', Dance::class);
        yield MenuItem::linkToCrud('Departments', 'fas fa-map-marker-alt', Department::class);
        yield MenuItem::linkToCrud('Нас. пункты', 'fas fa-map-marker-alt', Place::class);
        yield MenuItem::linkToCrud('Regions', 'fas fa-map-marker-alt', Region::class);
        yield MenuItem::linkToCrud('Sources', 'fa fa-address-card', Source::class);
        yield MenuItem::linkToCrud('Types', 'fa fa-grip-horizontal', Type::class);
        yield MenuItem::linkToCrud('Versions', 'fas fa-code-branch', Version::class);
        yield MenuItem::linkToCrud('Videos', 'fa fa-video-camera', Video::class);
        yield MenuItem::linkToCrud('Songs', 'fa fa-solid fa-music', Song::class);
    }
}
