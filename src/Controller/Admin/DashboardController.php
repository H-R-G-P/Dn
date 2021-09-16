<?php

namespace App\Controller\Admin;

use App\Entity\Dance;
use App\Entity\Region;
use App\Entity\Source;
use App\Entity\Type;
use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     *
     * @return Response
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dn');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Dances', 'fas fa-user-friends', Dance::class);
        yield MenuItem::linkToCrud('Regions', 'fas fa-map-marker-alt', Region::class);
        yield MenuItem::linkToCrud('Sources', 'fab fa-sourcetree', Source::class);
        yield MenuItem::linkToCrud('Types', 'fab fa-tumblr', Type::class);
        yield MenuItem::linkToCrud('Versions', 'fas fa-code-branch', Version::class);
    }
}
