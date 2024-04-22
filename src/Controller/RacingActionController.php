<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RacingActionController extends AbstractController
{
    #[Route('/', name: 'app_racing_action')]
    public function index(): Response
    {
        return $this->render('racing_action/index.html.twig', [
            'controller_name' => 'Hello Controller Sachendings',
        ]);
    }
}
