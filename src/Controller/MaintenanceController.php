<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'work_')]
class MaintenanceController extends AbstractController
{
    /**
     * Maintenance.
     *
     * Diese Seite kann benutzt werden um den Status
     * "Wir arbeiten gerade an der Seite" anzuzeigen.
     *
     * Route: work_maintenance
     */
    #[Route('/maintenance', name: 'maintenance')]
    public function maintenance(): Response
    {
        return $this->render('pages/maintenance/maintenance.html.twig');
    }

    /**
     * Coming Soon.
     *
     * Diese Seite kann benutzt werden um den Status
     * "Wir sind bald erreichbar" anzuzeigen.
     *
     * Route: work_maintenance
     */
    #[Route('/coming-soon', name: 'coming-soon')]
    public function coming_soon(): Response
    {
        return $this->render('pages/maintenance/coming-soon.html.twig');
    }
}
