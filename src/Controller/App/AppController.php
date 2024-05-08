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
     * ? Route: app_index
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('app/demo/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * Undocumented function.
     */
    #[Route('/arbeiten', name: 'arbeiten')]
    public function arbeiten(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('app/demo/arbeiten.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
