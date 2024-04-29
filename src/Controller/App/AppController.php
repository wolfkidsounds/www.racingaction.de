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

        $user->getEmail(); // get = bekommen (den wert);
        $user->setEmail('eric@kartoffel.de'); // set = wert setzen
        
        return $this->render('app/app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
