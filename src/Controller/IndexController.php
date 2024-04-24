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
        return $this->render('seiten/organizer/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
