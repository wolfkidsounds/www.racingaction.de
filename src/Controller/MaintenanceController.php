<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name:'work_')]
class MaintenanceController extends AbstractController
{
    #[Route('/maintenance', name: 'maintenance')]
    public function maintenance(): Response
    {
        return $this->render('public/maintenance/maintenance.html.twig', [
            'controller_name' => 'MaintenanceController',
        ]);
    }

    #[Route('/coming-soon', name: 'coming-soon')]
    public function coming_soon(): Response
    {
        return $this->render('public/maintenance/coming-soon.html.twig', [
            'controller_name' => 'MaintenanceController',
        ]);
    }
}
