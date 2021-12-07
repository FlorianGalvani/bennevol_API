<?php

namespace App\Controller\Admin;

use App\Entity\Cities;
use App\Entity\Departements;
use App\Entity\Dumpsters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CitiesCrudController::class)->generateUrl();
        $url = $routeBuilder->setController(DepartementsCrudController::class)->generateUrl();
        $url = $routeBuilder->setController(DumpstersCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bennevol API');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Cities', 'fas fa-city', Cities::class);
        yield MenuItem::linkToCrud('Departements', 'fas fa-map-marker-alt', Departements::class);
        yield MenuItem::linkToCrud('Dumpsters', 'fas fa-dumpster-fire', Dumpsters::class);
        
    }
}
