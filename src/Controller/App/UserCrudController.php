<?php

// src/Controller/App/EventCrudController.php

namespace App\Controller\App;

use App\Entity\Event;
use App\Form\App\EventFormType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/app/user', name: 'app_user_')]
class UserCrudController extends AbstractController
{
    #[Route('/profile', name: 'profile', methods: ['GET'])]
    public function profile(): Response
    {
        return $this->render('app/pages/user/profile.html.twig', [
            'title' => 'Dein Profil',
        ]);
    }

    #[Route('/settings', name: 'settings', methods: ['GET'])]
    public function settings(): Response
    {
        return $this->render('app/pages/user/settings.html.twig', [
            'title' => 'Einstellungen',
        ]);
    }
}
