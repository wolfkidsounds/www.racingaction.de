<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_racing_action')]
    public function index(): Response
    {
        return $this->render('seiten/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/hallo', name: 'app_hallo')]
    public function hallo(): Response
    {
        return $this->render('seiten/hallo.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
