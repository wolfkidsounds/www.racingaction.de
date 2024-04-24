<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'public_index')]
    public function index(): Response
    {
        return $this->render('seiten/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/organizer', name: 'public_organizer')]
    public function organizer(): Response
    {
        return $this->render('seiten/user/organizer/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/rider', name: 'rider')]
    public function rider(): Response
    {
        return $this->render('seiten/user/rider/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/event', name: 'event')]
    public function event(): Response
    {
        return $this->render('seiten/calendar/event/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
