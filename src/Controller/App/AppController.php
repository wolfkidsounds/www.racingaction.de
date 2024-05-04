<?php

namespace App\Controller\App;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/app', name:'app_')] // prefix für alle folgenden routen
class AppController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        
        return $this->render('app/demo/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/event', name: 'event')]
    public function event(): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        
        return $this->render('app/demo/event.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

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

