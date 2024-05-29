<?php

// src/Controller/Admin/AdminController.php

namespace App\Controller\Admin;

use App\Repository\EventRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    /**
     * Admin Dashboard
     *
     * @param UserRepository $userRepository
     * @param EventRepository $eventRepository
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(UserRepository $userRepository, EventRepository $eventRepository): Response
    {
        return $this->render('admin/pages/index.html.twig', [
            'page_title' => 'Dashboard',
            'users' => $userRepository->findAll(),
            'events' => $eventRepository->findAll(),
        ]);
    }
}
