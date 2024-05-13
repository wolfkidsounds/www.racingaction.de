<?php

namespace App\Controller\App;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/app', name: 'app_')] // prefix für alle folgenden routen
class AppController extends AbstractController
{
    /**
     * Index (Dashboard).
     *
     * Das ist die Startseite, die man sieht wenn man die App 'Öffnet'
     * Man könnte auch sagen "Home"
     *
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('app/pages/index.html.twig', [
            'title' => 'Dashboard',
        ]);
    }
}
